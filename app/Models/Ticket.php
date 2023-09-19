<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'title',
        'employee_id',
        'priority',
        'time_slot',
        'description',
        'ticket_code',
        'created_by',
        'ticket_created',
        'company_name',
        'employee_phone',
        'status',
        'meeting_link',
        'meeting_report',
    ];

    public function getMeetingReportAttribute($value)
    {
        return ($value) ? storage_path($value) : '';
    }

    public function ticketUnread()
    {
        if (\Auth::user()->type == 'employee') {

            return TicketReply::where('ticket_id', $this->id)->where('is_read', 0)->where('created_by', '!=', \Auth::user()->id)->count('id');
        } else {
            return TicketReply::where('ticket_id', $this->id)->where('is_read', 0)->where('created_by', '!=', \Auth::user()->creatorId())->count('id');
        }
    }

    public function createdBy()
    {
        return $this->hasOne('App\Models\User', 'id', 'ticket_created');
    }

    public function employee()
    {
        return $this->hasOne('App\Models\User', 'id', 'employee_id');
    }
}
