<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index()
    {

        $tasks = ProjectTask::whereIn('created_by', [auth()->user()->creatorId(), auth()->id()])->get();
        return view('employee.content.task.index', compact('tasks'));
    }
    public function create()
    {
        $hrs = [
            'allocated' => ProjectTask::whereIn('created_by', [auth()->user()->creatorId(), auth()->id()])->sum('estimated_hrs'),
        ];
        return view('employee.content.task.create', compact('hrs'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(), [
                'name' => 'required',
                'estimated_hrs' => 'required',
                'priority' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with('error', Utility::errorFormat($validator->getMessageBag()));
        }
        $post = $request->all();
        $post['assign_to'] = $request->assign_to;
        $post['created_by'] = auth()->user()->creatorId();
        $post['start_date'] = date("Y-m-d H:i:s", strtotime($request->start_date));
        $post['end_date'] = date("Y-m-d H:i:s", strtotime($request->end_date));
        ProjectTask::create($post);
        return redirect()->back()->with('success', __('Task added successfully.'));
    }

    public function show($task_id)
    {
        $task = ProjectTask::find($task_id);
        return view('employee.content.task.view', compact('task'));
    }


    public function edit($task_id)
    {
        $hrs = [
            'allocated' => ProjectTask::whereIn('created_by', [auth()->user()->creatorId(), auth()->id()])->sum('estimated_hrs'),
        ];
        $task = ProjectTask::find($task_id);
        return view('employee.content.task.edit', compact('task','hrs'));
    }

    public function update(Request $request, $task_id)
    {
        $validator = Validator::make(
            $request->all(), [
                'name' => 'required',
                'estimated_hrs' => 'required',
                'priority' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->with('error', Utility::errorFormat($validator->getMessageBag()));
        }
        $post = $request->all();
        $task = ProjectTask::find($task_id);
        $task->update($post);
        return redirect()->back()->with('success', __('Task Updated successfully.'));
    }

    public function destroy($task_id)
    {
        ProjectTask::deleteTask([$task_id]);
        return redirect()->back()->with('success', __('Task Deleted successfully.'));
    }

    public function taskBoardView(Request $request)
    {
        $usr = Auth::user();
        if ($request->ajax() && $request->has('view') && $request->has('sort')) {
            $sort = explode('-', $request->sort);
            $tasks = ProjectTask::whereIn('created_by', [auth()->user()->creatorId(), auth()->id()])->orderBy($sort[0], $sort[1]);
            if (!empty($request->keyword)) {
                $tasks->where('name', 'LIKE', $request->keyword . '%');
            }
            if (!empty($request->status)) {
                $todaydate = date('Y-m-d');
                // For Optimization
                $status = $request->status;
                foreach ($status as $k => $v) {
                    if ($v == 'due_today' || $v == 'over_due' || $v == 'starred' || $v == 'see_my_tasks') {
                        unset($status[$k]);
                    }
                }
                if (count($status) > 0) {
                    $tasks->whereIn('priority', $status);
                }

                if (in_array('see_my_tasks', $request->status)) {
                    $tasks->whereRaw("find_in_set('" . $usr->id . "',assign_to)");
                }

                if (in_array('due_today', $request->status)) {
                    $tasks->where('end_date', $todaydate);
                }

                if (in_array('over_due', $request->status)) {
                    $tasks->where('end_date', '<', $todaydate);
                }

                if (in_array('starred', $request->status)) {
                    $tasks->where('is_favourite', '=', 1);
                }
            }

            $tasks = $tasks->get();

            $returnHTML = view('employee.content.task.' . $request->view, compact('tasks'))->render();

            return response()->json(
                [
                    'success' => true,
                    'html' => $returnHTML,
                ]
            );
        }
    }


}
