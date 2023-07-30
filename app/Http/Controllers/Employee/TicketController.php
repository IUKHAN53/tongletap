<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Ticket;
use App\Models\User;
use App\Models\TicketReply;
use App\Notifications\CounsellorRequested;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    public function index()
    {
        $countPendingTicket = Ticket::where('status', '=', 'pending')->where('created_by', '=', Auth::user()->creatorId())->count();
        $countTicket = Ticket::where('created_by', '=', Auth::user()->creatorId())->count();
        $countApprovedTicket = Ticket::where('status', '=', 'approved')->where('created_by', '=', Auth::user()->creatorId())->count();
        $countRejectedTicket = Ticket::where('status', '=', 'rejected')->where('created_by', '=', Auth::user()->creatorId())->count();
        $tickets = Ticket::where('ticket_created', Auth::user()->id)->latest()->get();
        return view('employee.content.ticket.index', compact('tickets', 'countTicket', 'countPendingTicket', 'countApprovedTicket', 'countRejectedTicket'));
    }

    public function create()
    {
        return view('employee.content.ticket.create');
    }

    public function store(Request $request)
    {
        {
            $validator = Validator::make($request->all(), [
                'title' => 'required',
                'phone' => 'required',
                'priority' => 'required',
                'time_slot' => 'required|date|after_or_equal:today',
                'description' => 'required',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('error', $validator->messages()->first());
            }

            $lastTicket = Ticket::latest('id')->first();
            $newTicketCode = $lastTicket ? sprintf("%07d", $lastTicket->ticket_code + 1) : "0000001";

            $ticketData = [
                'title' => $request->title,
                'employee_phone' => $request->phone,
                'employee_id' => auth()->id(),
                'company_name' => auth()->user()->ownerDetails()->name,
                'priority' => $request->priority,
                'time_slot' => $request->time_slot,
                'ticket_code' => $newTicketCode,
                'description' => $request->description,
                'ticket_created' => Auth::user()->id,
                'created_by' => Auth::user()->creatorId(),
                'status' => 'pending',
            ];

            $ticket = Ticket::create($ticketData);

            $admins = User::whereHas('roles', function ($query) {
                $query->where('name', 'super admin');
            })->get();

            foreach ($admins as $admin) {
                $admin->notify(new CounsellorRequested($ticket));
            }
            return redirect()->route('employee.ticket.index')->with('success', __('Ticket successfully created.'));
        }
    }

    public function edit($ticket)
    {
        $ticket = Ticket::find($ticket);
        $ticket->time_slot = date('Y-m-d H:i', strtotime($ticket->time_slot));
        return view('employee.content.ticket.edit', compact('ticket'));
    }

    public function update(Request $request, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'time_slot' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        $requestedTimeSlot = Carbon::parse($request->time_slot);

        if ($requestedTimeSlot->isPast()) {
            return redirect()->back()->with('error', __('Please Select Today or a Future Date'));
        }

        $ticket->update([
            'title' => $request->title,
            'time_slot' => $requestedTimeSlot,
            'employee_phone' => $request->EmployeePhone ?? $ticket->employee_phone,
            'company_name' => User::find($request->CompanyName)->name ?? $ticket->company_name,
            'employee_id' => Auth::user()->id,
            'priority' => $request->priority,
            'description' => $request->description,
        ]);

        return redirect()->route('employee.ticket.index', compact('ticket'))->with('success', __('Ticket successfully updated.'));
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('employee.ticket.index')->with('success', __('Ticket successfully deleted.'));
    }

    public function reply($ticket)
    {
        $ticketreply = TicketReply::where('ticket_id', '=', $ticket)->orderBy('id', 'DESC')->get();
        $ticket = Ticket::find($ticket);
        return view('employee.content.ticket.reply', compact('ticket', 'ticketreply'));
    }
}
