<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    protected $guarded = [];

    public static $priority = [
        'Low',
        'Medium',
        'High',
        'Critical',
    ];

    public function createdBy()
    {
        return $this->hasOne('App\Models\user', 'id', 'ticket_created');
    }

    public function assignUser()
    {
        return $this->hasOne('App\Models\user', 'id', 'user');
    }

    public static $status = [
        'Open' => 'Open',
        'Close' => 'Close',
        'On Hold' =>  'On Hold',
    ];

    public static function status() {
        $status['Open'] = __ ('Open');
        $status['Close'] = __ ('Close');
        $status['On Hold'] = __ ('On Hold');
        return $status;
    }

    public function replyUnread()
    {

        if(\Auth::user()->type == 'employee')
        {
            return SupportReply:: where('support_id', $this->id)->where('is_read', 0)->where('user', '!=', \Auth::user()->id)->count('id');
        }
        else
        {
            return SupportReply:: where('support_id', $this->id)->where('is_read', 0)->count('id');
        }
    }
}
