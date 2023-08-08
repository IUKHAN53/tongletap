<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $todaydate = date('Y-m-d');
        $expired_events = Event::where('start_date', '<', $todaydate)
            ->orderBy('start_date', 'desc')->where('company_name', '=', Auth::user()->ownerDetails()->name)->get();

        $employees = Employee::where('created_by', '=', Auth::user()->creatorId())->get();
        $events = Event::query();
        $events = $events->where('company_name', '=', Auth::user()->ownerDetails()->name)->get();
        $transdate = date('Y-m-d', time());

        $today_date = date('m');
        $current_month_event = Event::select('id', 'start_date', 'end_date', 'title', 'created_at', 'color')
            ->whereRaw('MONTH(start_date)=' . $today_date)->whereRaw('MONTH(end_date)=' . $today_date);
        $current_month_event = $current_month_event->where('company_name', '=', Auth::user()->ownerDetails()->name)->get();
        $arrEvents = [];
        foreach ($events as $event) {
            $arr['id'] = $event['id'];
            $arr['title'] = $event['title'];
            $arr['start'] = $event['start_date'];
            $arr['end'] = $event['end_date'];
            $arr['className'] = 'custom-btn';
            $arr['url'] = route('event.edit', $event['id']);
            $arrEvents[] = $arr;
        }
        $arrEvents = str_replace('"[', '[', str_replace(']"', ']', json_encode($arrEvents)));
        return view('employee.content.event.index', compact('arrEvents', 'employees', 'transdate', 'events', 'current_month_event', 'expired_events'));
    }
}
