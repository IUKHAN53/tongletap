<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Event;
use App\Models\EventEmployee;
use App\Models\Projects;
use App\Models\Ticket;
use App\Models\Tasks;
use App\Models\Timemodule;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('manage event')) {
            $todaydate = date('Y-m-d');
            $expired_events = Event::where('start_date', '<', $todaydate)
                ->orderBy('start_date', 'desc');
            $expired_events = $expired_events->when(\auth()->user()->type != 'super admin', function ($query){
                $query->where(function ($query) {
                    $query->where('company_name', '=', Auth::user()->name)
                        ->orWhere('company_name', '=', Auth::user()->ownerDetails()->name);
                });
            })->get();

            $employees = Employee::where('created_by', '=', Auth::user()->creatorId())->get();
            $events = Event::query();
            $events = $events->when(\auth()->user()->type != 'super admin', function ($query){
                $query->where(function ($query) {
                    $query->where('company_name', '=', Auth::user()->name)
                        ->orWhere('company_name', '=', Auth::user()->ownerDetails()->name);
                });
            })->get();
            $transdate = date('Y-m-d', time());

            $today_date = date('m');
            $current_month_event = Event::select('id', 'start_date', 'end_date', 'title', 'created_at', 'color')
                ->whereRaw('MONTH(start_date)=' . $today_date)
                ->whereRaw('MONTH(end_date)=' . $today_date);
            $current_month_event = $current_month_event->when(\auth()->user()->type != 'super admin', function ($query){
                $query->where(function ($query) {
                    $query->where('company_name', '=', Auth::user()->name)
                        ->orWhere('company_name', '=', Auth::user()->ownerDetails()->name);
                });
            })->get();
            $arrEvents = [];

            foreach ($events as $event) {
                $arr['id'] = $event['id'];
                $arr['title'] = $event['title'];
                $arr['start'] = $event['start_date'];
                $arr['end'] = $event['end_date'];
                $arr['className'] = $event['color'];
                $arr['url'] = route('event.edit', $event['id']);
                $arrEvents[] = $arr;
            }
            $arrEvents = str_replace('"[', '[', str_replace(']"', ']', json_encode($arrEvents)));
            // echo $arrEvents;

            return view('event.index', compact('arrEvents', 'employees', 'transdate', 'events', 'current_month_event', 'expired_events'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (Auth::user()->type == "super admin" || Auth::user()->can('create event')) {
            $companyname = Timemodule::where('company_name', '!=', '')->get()->pluck('company_name', 'id');
            $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');
            $branch = Branch::where('created_by', '=', \Auth::user()->creatorId())->get();
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get();
            return view('event.create', compact('employees', 'branch', 'departments', 'companyname'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if (Auth::user()->can('create event')) {

            $validator = Validator::make(
                $request->all(),
                [
                    'branch_id' => 'required',
                    'department_id' => 'required',
                    'employee_id' => 'required',
                    'title' => 'required',
                    'start_date' => 'required',
                    'company_name' => 'required',
                    'end_date' => 'required',
                    'color' => 'required',
                ]
            );
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $companyname = Timemodule::where('id', $request->company_name)->first();
            // dd($request->all());
            $event = new Event();
            $event->branch_id = $request->branch_id;
            $event->department_id = json_encode($request->department_id);
            $event->employee_id = json_encode($request->employee_id);
            $event->title = $request->title;
            $event->company_name = $companyname->company_name;
            $event->start_date = $request->start_date;
            $event->end_date = $request->end_date;
            $event->color = $request->color;
            $event->description = $request->description;
            $event->created_by = Auth::user()->creatorId();
            $event->save();

            //  slack
            $setting = Utility::settings(\Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            if (isset($setting['event_notification']) && $setting['event_notification'] == 1) {
                $msg = $request->title . ' ' . __("for branch") . ' ' . $branch->name . ' ' . ("from") . ' ' . $request->start_date . ' ' . __("to") . ' ' . $request->end_date . '.';
                Utility::send_slack_msg($msg);
            }

            //telegram
            $setting = Utility::settings(\Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            if (isset($setting['telegram_ticket_notification']) && $setting['telegram_ticket_notification'] == 1) {
                $msg = $request->title . ' ' . __("for branch") . ' ' . $branch->name . ' ' . ("from") . ' ' . $request->start_date . ' ' . __("to") . ' ' . $request->end_date . '.';
                Utility::send_telegram_msg($msg);
            }


            //twilio
            $setting = Utility::settings(\Auth::user()->creatorId());
            $branch = Branch::find($request->branch_id);
            $departments = Department::where('branch_id', $request->branch_id)->first();
            $employee = Employee::where('branch_id', $request->branch_id)->first();

            if (isset($setting['twilio_event_notification']) && $setting['twilio_event_notification'] == 1) {
                $employeess = Employee::whereIn('branch_id', $request->employee_id)->get();
                foreach ($employeess as $key => $employee) {
                    $msg = $request->title . ' ' . __("for branch") . ' ' . $branch->name . ' ' . ("from") . ' ' . $request->start_date . ' ' . __("to") . ' ' . $request->end_date . '.';
                    Utility::send_twilio_msg($employee->phone, $msg);
                }
            }


            if (in_array('0', $request->employee_id)) {
                $departmentEmployee = Employee::whereIn('department_id', $request->department_id)->get()->pluck('id');
                $departmentEmployee = $departmentEmployee;
            } else {
                $departmentEmployee = $request->employee_id;
            }
            foreach ($departmentEmployee as $employee) {
                $eventEmployee = new EventEmployee();
                $eventEmployee->event_id = $event->id;
                $eventEmployee->employee_id = $employee;
                $eventEmployee->created_by = \Auth::user()->creatorId();
                $eventEmployee->save();
            }

            return redirect()->route('event.index')->with('success', __('Event  successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function show(Event $event)
    {
        return redirect()->route('event.index');
    }

    public function edit($event)
    {

        if (\Auth::user()->can('edit event')) {
            $event = Event::find($event);
            if ($event->created_by == Auth::user()->creatorId()) {
                $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id');

                return view('event.edit', compact('event', 'employees'));
            } else {
                return response()->json(['error' => __('Permission denied.')], 401);
            }
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function update(Request $request, Event $event)
    {
        if (\Auth::user()->can('edit event')) {
            if ($event->created_by == \Auth::user()->creatorId()) {
                $validator = \Validator::make($request->all(), [
                    'title' => 'required',
                    'start_date' => 'required',
                    'end_date' => 'required',
                    'color' => 'required',
                ]);
                if ($validator->fails()) {
                    $messages = $validator->getMessageBag();

                    return redirect()->back()->with('error', $messages->first());
                }

                $event->title = $request->title;
                $event->start_date = $request->start_date;
                $event->end_date = $request->end_date;
                $event->color = $request->color;
                $event->description = $request->description;
                $event->save();

                return redirect()->route('event.index')->with('success', __('Event successfully updated.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Event $event)
    {
        if (\Auth::user()->can('delete event')) {
            if ($event->created_by == \Auth::user()->creatorId()) {
                $event->delete();

                return redirect()->route('event.index')->with('success', __('Event successfully deleted.'));
            } else {
                return redirect()->back()->with('error', __('Permission denied.'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function getdepartment(Request $request)
    {

        if ($request->branch_id == 0) {
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } else {
            $departments = Department::where('created_by', '=', \Auth::user()->creatorId())->where('branch_id', $request->branch_id)->get()->pluck('name', 'id')->toArray();
        }

        return response()->json($departments);
    }

    public function getemployee(Request $request)
    {

        if (in_array('0', [$request->department_id])) {
            $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->get()->pluck('name', 'id')->toArray();
        } else {
            $employees = Employee::where('created_by', '=', \Auth::user()->creatorId())->whereIn('department_id', [$request->department_id])->get()->pluck('name', 'id')->toArray();
        }

        return response()->json($employees);
    }
}
