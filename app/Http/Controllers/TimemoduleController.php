<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Timemodule;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class TimemoduleController extends Controller
{
    public function index()
    {
        if (\Auth::user()->can('manage time module')) {
            if (\Auth::user()->type == 'super admin') {
                $timemodules = DB::table('timemodule')->orderBy('id', 'DESC')->get();
                return view('timemodule.index', compact('timemodules'));
            } else {
                $clientdatas = DB::table('timemodule')->where('company_name', \Auth::user()->name)->get();
                return view('timemodule.index', compact('clientdatas'));
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (\Auth::user()->can('manage time module')) {
            // $companyname = Ticket::where('company_name', '!=', '')->get()->pluck('company_name', 'id');
            $companyname = User::where('type', 'company')->get()->pluck('name');
            $users = DB::table('users')->orderBy('id', 'DESC')->get()->pluck('name');
            return view('timemodule.create', compact('users', 'companyname'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if (\Auth::user()->can('manage time module')) {
            $validator = \Validator::make($request->all(), [
                // 'employeename' => 'required',
                'companyname' => 'required',
                'time_slot' => 'required'
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }

           // $timecheck = Timemodule::where('employee_name', $request->employeename)->get();
            $timecheck = Timemodule::where('company_name', $request->companyname)->get();
            if (count($timecheck) == 0) {
                $timemodule        = new Timemodule();
                $timemodule->total_hours_purchase = $request->totalhourspurchase ? $request->totalhourspurchase : null;
                $timemodule->total_hours_used = $request->totalhoursused ? $request->totalhoursused : null;
                $timemodule->remaining_hours = $request->remaininghours ? $request->remaininghours : null;
                // $timemodule->employee_name     = $request->employeename;
                $timemodule->company_name     = $request->companyname;
                $timemodule->datetime         = $request->time_slot;
                $timemodule->save();
                return redirect()->route('timemodule.index')->with('success', __('sleep successfully created.'));
            } else {
                return redirect()->back()->with('error', $request->employeename . ' already used');
            }
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function destroy(Timemodule $timemodule)
    {
        if (\Auth::user()->type == "super admin") {
            $timemodule->delete();
            return redirect()->route('timemodule.index')->with('success', __('Timemodule successfully deleted.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }


    public function edit(Timemodule $timemodule)
    {
       // $companyname = Ticket::select('company_name')->where('company_name', '!=', '')->get();
       $companyname = Timemodule::select('company_name')->where('company_name', '!=', '')->get();
        $users = User::select('name')->orderBy('id', 'DESC')->get();
        return view('timemodule.edit', compact('timemodule', 'users', 'companyname'));
    }

    public function update(Request $request, $timemodule)
    {
        $timemodule = Timemodule::find($timemodule);
        if (\Auth::user()->can('manage time module')) {
            $validator = \Validator::make($request->all(), [
                'companyname' => 'required',
                'time_slot' => 'required'
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $timemodule->total_hours_purchase = $request->totalhourspurchase ? $request->totalhourspurchase : null;
            $timemodule->total_hours_used = $request->totalhoursused ? $request->totalhoursused : null;
            $timemodule->remaining_hours = $request->remaininghours ? $request->remaininghours : null;
            // $timemodule->employee_name     = $request->employeename;
            $timemodule->company_name     = $request->companyname;
            $timemodule->datetime         = $request->time_slot;
            $timemodule->save();
            return redirect()->route('timemodule.index')->with('success', __('timemodule successfully updated.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
