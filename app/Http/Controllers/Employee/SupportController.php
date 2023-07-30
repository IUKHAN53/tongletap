<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Models\SupportReply;
use App\Models\User;
use App\Models\Utility;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        $supports = Support::where('user', auth()->user()->id)->get();
        $countTicket = Support::where('user', auth()->user()->id)->count();
        $countOpenTicket = Support::where('status','Open')->where('user', auth()->user()->id)->count();
        $countonholdTicket = Support::where('status','On Hold')->where('user', auth()->user()->id)->count();
        $countCloseTicket = Support::where('status','Close')->where('user', auth()->user()->id)->count();
        return view('employee.content.support.index', compact('supports', 'countTicket', 'countOpenTicket', 'countonholdTicket', 'countCloseTicket'));
    }


    public function create()
    {
        $priority = [
            __('Low'),
            __('Medium'),
            __('High'),
            __('Critical'),
        ];
        //$status = Support::$status;
        $status = Support::status();
        $users = User::where('created_by', auth()->user()->creatorId())->get()->pluck('name', 'id');
        return view('employee.content.support.create', compact('priority', 'users', 'status'));
    }


    public function store(Request $request)
    {

        $validator = \Validator::make(
            $request->all(), [
                'subject' => 'required',
                'priority' => 'required',
            ]
        );
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $support = new Support();
        $support->subject = $request->subject;
        $support->priority = $request->priority;
        $support->end_date = $request->end_date;
        $support->ticket_code = date('hms');
        $support->status = 'Open';

        if ($request->hasFile('attachment')) {
            if ($support->attachment) {
                $path = storage_path('uploads/supports' . $support->attachment);
                if (file_exists($path)) {
                    \File::delete($path);
                }
            }
            $fileName = time() . "_" . $request->attachment->getClientOriginalName();
            $support->attachment = $fileName;
            $dir = 'uploads/supports';
            $path = Utility::upload_file($request, 'attachment', $fileName, $dir, []);
            if ($path['flag'] == 0) {
                return redirect()->back()->with('error', __($path['msg']));
            }
        }
        $support->description = $request->description;
        $support->created_by = auth()->user()->id;
        $support->ticket_created = auth()->user()->id;
        $request->user = auth()->user()->id;
        $support->save();

        return redirect()->route('employee.support.index')->with('success', __('Support successfully added.'));
    }


    public function show(Support $support)
    {
        //
    }


    public function edit(Support $support)
    {
        $priority = [
            __('Low'),
            __('Medium'),
            __('High'),
            __('Critical'),
        ];
        //$status = Support::$status;
        $status = Support::status();
        $users = User::where('created_by', auth()->user()->creatorId())->get()->pluck('name', 'id');

        return view('employee.content.support.edit', compact('priority', 'users', 'support', 'status'));
    }


    public function update(Request $request, Support $support)
    {

        $validator = \Validator::make(
            $request->all(), [
                'subject' => 'required',
                'priority' => 'required',
            ]
        );

        if ($validator->fails()) {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $support->subject = $request->subject;
        $support->user = auth()->user()->id;
        $support->priority = $request->priority;
        $support->status = $request->status;
        $support->end_date = $request->end_date;
        if ($request->hasFile('attachment')) {
            if ($support->attachment) {
                $path = storage_path('uploads/supports' . $support->attachment);
                if (file_exists($path)) {
                    \File::delete($path);
                }
            }
            $fileName = time() . "_" . $request->attachment->getClientOriginalName();
            $support->attachment = $fileName;
            $dir = 'uploads/supports';
            $path = Utility::upload_file($request, 'attachment', $fileName, $dir, []);
            if ($path['flag'] == 0) {
                return redirect()->back()->with('error', __($path['msg']));
            }
        }
        $support->description = $request->description;

        $support->save();

        return redirect()->route('employee.support.index')->with('success', __('Support successfully updated.'));

    }


    public function destroy(Support $support)
    {
        $support->delete();
        if ($support->attachment) {
            \File::delete(storage_path('uploads/supports/' . $support->attachment));
        }
        return redirect()->route('employee.support.index')->with('success', __('Support successfully deleted.'));

    }

    public function reply($ids)
    {
        $id = \Crypt::decrypt($ids);
        $replyes = SupportReply::where('support_id', $id)->get();
        $support = Support::find($id);

        foreach ($replyes as $reply) {
            $supportReply = SupportReply::find($reply->id);
            $supportReply->is_read = 1;
            $supportReply->save();
        }

        return view('employee.content.support.reply', compact('support', 'replyes'));
    }

    public function replyAnswer(Request $request, $id)
    {
        $supportReply = new SupportReply();
        $supportReply->support_id = $id;
        $supportReply->user = auth()->user()->id;
        $supportReply->description = $request->description;
        $supportReply->created_by = auth()->user()->creatorId();
        $supportReply->save();

        return redirect()->back()->with('success', __('Support reply successfully send.'));
    }

    public function grid()
    {
        $supports = Support::where('user', auth()->user()->id)->orWhere('ticket_created', auth()->user()->id)->get();
        return view('employee.content.support.grid', compact('supports'));
    }
}
