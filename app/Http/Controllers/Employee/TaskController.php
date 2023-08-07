<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\ProjectTask;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index($view = 'list')
    {
        if ($view == 'list') {
            $tasks = ProjectTask::where('created_by', \Auth::user()->creatorId())->get();
            return view('employee.content.task.list', compact('view', 'tasks'));
        } else {
            $tasks = ProjectTask::where('created_by', \Auth::user()->creatorId())->get();
            return view('employee.content.task.grid', compact('tasks', 'view'));
        }
    }


}
