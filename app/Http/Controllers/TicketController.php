<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketReply;
use App\Notifications\ConsellerRequested;
use App\Notifications\CounsellorRequested;
use App\Notifications\CounsellorStatusChanged;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use IlluminateAuth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\FacadesAuth;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function index()
    {
        if (Auth::user()->can('manage ticket')) {
            if (Auth::user()->type == 'super admin') {
                $countTicket = Ticket::all()->count();
                $countPendingTicket = Ticket::where('status', '=', 'pending')->count();
                $countApprovedTicket = Ticket::where('status', '=', 'approved')->count();
                $countRejectedTicket = Ticket::where('status', '=', 'rejected')->count();
            } else {
                $countTicket = Ticket::where('created_by', '=', Auth::user()->creatorId())->count();
                $countPendingTicket = Ticket::where('status', '=', 'pending')->where('created_by', '=', Auth::user()->creatorId())->count();
                $countApprovedTicket = Ticket::where('status', '=', 'approved')->where('created_by', '=', Auth::user()->creatorId())->count();
                $countRejectedTicket = Ticket::where('status', '=', 'rejected')->where('created_by', '=', Auth::user()->creatorId())->count();
            }

            $arr = [];
            array_push($arr, $countTicket, $countPendingTicket, $countApprovedTicket, $countRejectedTicket);
            $ticket_arr = json_encode($arr);

            if (Auth::user()->type == 'super admin') {
                $tickets = Ticket::all();
            } else if (Auth::user()->type == 'employee') {
                $tickets = Ticket::where('ticket_created', Auth::user()->id)->get();
            } else if (Auth::user()->type == 'accountant') {
                $tickets = Ticket::where('ticket_created', Auth::user()->id)->get();
            } else if (Auth::user()->type == 'company') {
                $tickets = Ticket::where('ticket_created', Auth::user()->id)->get();
            } else if (Auth::user()->type == 'customer') {
                $tickets = Ticket::where('ticket_created', Auth::user()->id)->get();
            } else if (Auth::user()->type == 'client') {
                $tickets = Ticket::where('ticket_created', Auth::user()->id)->get();
            } else {
                $tickets = Ticket::select('tickets.*')->join('users', 'tickets.created_by', '=', 'users.id')->where('users.created_by', '=', Auth::user()->creatorId())->orWhere('tickets.created_by', Auth::user()->creatorId())->get();
            }

            return view('ticket.index', compact('tickets', 'countTicket', 'countPendingTicket', 'countApprovedTicket', 'countRejectedTicket', 'ticket_arr'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function create()
    {
        if (Auth::user()->type == 'super admin') {
            $employees = Employee::all()->pluck('name', 'id');
            $company = User::where('type', 'company')->get()->pluck('name');
        } else {
            $employees = User::where('name', '=', Auth::user()->name)->get()->pluck('name', 'id');
            $company = User::where('type', 'company')->where('name', Auth()->user()->name)->get()->pluck('name');
        }
        return view('ticket.create', compact('employees', 'company'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'title' => 'required',
                // 'employee_id' => 'required',
                'EmployeePhone' => 'required',
                'priority' => 'required',
                'time_slot' => 'required',
                'description' => 'required',
                // 'CompanyName' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }


        $ticketalldata = Ticket::all();
        if (count($ticketalldata) == 0) {
            $rand = "0000001";
        } else {
            $getlastcode = Ticket::orderBy('id', 'DESC')->first();
            $newVal = $getlastcode->ticket_code + 1;
            $rand = sprintf("%07d", $newVal);
        }

        // $rand          = date('hms');
        $ticket = new Ticket();
        $ticket->title = $request->title;
        $ticket->employee_phone = $request->EmployeePhone;
        $ticket->company_name = $request->CompanyName ?? auth()->user()->name;
        if (Auth::user()->type == "employee") {
            $ticket->employee_id = auth()->id();
        } else {
            $ticket->employee_id = $request->employee_id;
        }
        $ticket->priority = $request->priority;

        $date1 = date("Y-m-d H:i");
        $date2 = $request->time_slot;
        if ($date1 > $date2) {
            return redirect()->back()->with('error', __('Please Select Today or After Date '));
        } else {
            $ticket->time_slot = $request->time_slot;
        }
        $ticket->ticket_code = $rand;
        $ticket->description = $request->description;

        $ticket->ticket_created = Auth::user()->id;
        $ticket->created_by = Auth::user()->creatorId();
        $ticket->status = 'pending';
        $ticket->save();

//        Send email notification to super admin
        if(Auth::user()->type != 'super admin'){
            $admins = User::whereHas('roles', function ($query) {
                $query->where('name', 'super admin');
            })->get();
            foreach ($admins as $admin) {
                $admin->notify(new CounsellorRequested($ticket));
            }
        }
        return redirect()->route('ticket.index')->with('success', __('Ticket  successfully created.'));
    }

    public function edit($ticket)
    {
        $ticket = Ticket::find($ticket);

        $ticket->time_slot = date('Y-m-d H:i', strtotime($ticket->time_slot));

        if (Auth::user()->type == 'super admin') {
            $employees = User::all()->pluck('name', 'id');
        } else {
            $employees = User::where('name', '=', Auth::user()->name)->get()->pluck('name', 'id');
        }

        return view('ticket.edit', compact('ticket', 'employees'));
    }

    public function update(Request $request, $ticket)
    {
        $ticket = Ticket::find($ticket);

        $validator = \Validator::make(
            $request->all(),
            [
                'title' => 'required',
                'employee_id' => 'required',
                'EmployeePhone' => 'required',
                'time_slot' => 'required',
                'description' => 'required',
                'CompanyName' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        if (strtotime($ticket->time_slot) <> strtotime($request->time_slot)) {
            $date1 = date("Y-m-d H:i");
            $date2 = $request->time_slot;
            if ($date1 > $date2) {
                return redirect()->back()->with('error', __('Please Select Today or After Date '));
            } else {
                $ticket->time_slot = $request->time_slot;
            }
        }
        $ticket->title = $request->title;
        $ticket->employee_phone = $request->EmployeePhone;
        $ticket->company_name = $request->CompanyName;
        if (Auth::user()->type == "employee") {
            $ticket->employee_id = Auth::user()->name;
        } else {
            $ticket->employee_id = $request->employee_id;
        }
        $ticket->priority = $request->priority;
        $ticket->description = $request->description;
        $ticket->save();

        return redirect()->route('ticket.index', compact('ticket'))->with('success', __('Ticket successfully updated.'));
    }

    public function destroy(Ticket $ticket)
    {
        if ($ticket->created_by == Auth::user()->creatorId()) {
            $ticket->delete();
            return redirect()->route('ticket.index')->with('success', __('Ticket successfully deleted.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function editStatus($id)
    {
        if (Auth::user()->type == 'super admin') {
            $ticket = Ticket::find($id);
            return view('ticket.edit-status', compact('ticket'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    public function updateStatus(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'status' => 'required|in:pending,approved,rejected',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $ticket = Ticket::find($id);
        $ticket->status = $request->status;
        $ticket->save();

//        send notification to user for status change
        $user = User::find($ticket->employee_id);
        if($user)$user->notify(new CounsellorStatusChanged($request->status, $ticket->ticket_code));

//        Notification::route('mail', [
//            'iu.khan53@gmail.com' => 'IU Khan',
//        ])->notify(new CounsellorStatusChanged($request->status, $ticket->ticket_code));

        return redirect()->route('ticket.index')->with('success', __('Ticket status successfully updated.'));
    }

    public function reply($ticket)
    {
        $ticketreply = TicketReply::where('ticket_id', '=', $ticket)->orderBy('id', 'DESC')->get();
        $ticket = Ticket::find($ticket);
        if (Auth::user()->type == 'employee') {
            $ticketreplyRead = TicketReply::where('ticket_id', $ticket->id)->where('created_by', '!=', Auth::user()->id)->update(['is_read' => '1']);
        } else {
            $ticketreplyRead = TicketReply::where('ticket_id', $ticket->id)->where('created_by', '!=', Auth::user()->creatorId())->update(['is_read' => '1']);
        }

        return view('ticket.reply', compact('ticket', 'ticketreply'));
    }

    public function changereply(Request $request)
    {
        $validator = \Validator::make(
            $request->all(),
            [
                'description' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $ticket = Ticket::find($request->ticket_id);

        $ticket_reply = new TicketReply();
        $ticket_reply->ticket_id = $request->ticket_id;
        $ticket_reply->employee_id = $ticket->employee_id;
        $ticket_reply->description = $request->description;
        if (Auth::user()->type == 'employee') {
            $ticket_reply->created_by = Auth::user()->id;
        } else {
            $ticket_reply->created_by = Auth::user()->creatorId();
        }
        $ticket_reply->save();

        return redirect()->route('ticket.reply', $ticket_reply->ticket_id)->with('success', __('Ticket Reply successfully Send.'));
    }
}
