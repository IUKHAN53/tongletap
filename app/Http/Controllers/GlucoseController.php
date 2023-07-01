<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class glucoseController extends Controller
{
    
    
    public function index(Request $request)
{
    
     if (\Auth::user()->can('manage health')) {
        $user = auth()->user();
        $companyName = $user->name;
        $query = DB::table('glucose')->orderBy('id', 'DESC');

        if ($companyName != 'Super Admin') {
            $query->where('company_name', $companyName)
                ->orderBy('id', 'DESC')
                ->get();
        } 
        if ($request->has('company_name')) {
                $companyName = $request->input('company_name');
                if($companyName!=''){
                $query->where('company_name', $companyName);
                }
            }
    
            if ($request->has('employee_name')) {
                $employeeName = $request->input('employee_name');
                if($employeeName!=''){
                $query->where('employee_name', $employeeName);
                }
            }
 $glucoses = $query->get();
        return view('glucose.index', compact('glucoses'));
    } 
 else {
        return redirect()->back()->with('error', __('Permission denied.'));
    }
    
    // Filtering Problem
    // if (\Auth::user()->can('manage health')) {
    //     $user = auth()->user();
    //     $companyName = $user->name;
    //     // echo($companyName);

    //     if ($companyName) {
    //         $glucoses = DB::table('glucose')
    //             ->where('company_name', $companyName)
    //             ->orderBy('id', 'DESC')
    //             ->get();
    //     } else {
    //         $glucoses = DB::table('glucose')->orderBy('id', 'DESC')->get();
    //     }

    //     return view('glucose.index', compact('glucoses'));
    // } else {
    //     return redirect()->back()->with('error', __('Permission denied.'));
    // }
}
    
    // public function index(Request $request)
    // {
    //     if (\Auth::user()->can('manage health')) {
    //         // $glucoses = DB::table('glucose')->orderBy('id', 'DESC')->get();
    //         $query = DB::table('glucose')->orderBy('id', 'DESC');
    //         // dd($query);

    //         if ($request->has('company_name')) {
    //             $companyName = $request->input('company_name');
    //             if($companyName!=''){
    //             $query->where('company_name', $companyName);
    //             }
    //         }
    
    //         if ($request->has('employee_name')) {
    //             $employeeName = $request->input('employee_name');
    //             if($employeeName!=''){
    //             $query->where('employee_name', $employeeName);
    //             }
    //         }

    //     $glucoses = $query->get();
    //         return view('glucose.index', compact('glucoses'));
    //     } else {
    //         return redirect()->back()->with('error', __('Permission denied.'));
    //     }
    // }

    public function create()
    {
        if (\Auth::user()->can('manage health')) {
            $companyname = Ticket::where('company_name', '!=', '')->get()->pluck('company_name', 'id');
            $employees   = Employee::all()->pluck('name', 'id');
            return view('glucose.create', compact('companyname','employees'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }
    
    
      public function store(Request $request)
    {
        if (\Auth::user()->can('manage health')) {
            $validator = \Validator::make($request->all(), [
                'mgdl' => 'required',
                'messure_type' => 'required',
                // 'company_name' => 'required',
                'employee_name' => 'required',
                'time_slot' => 'required',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $user = auth()->user();
            // $companyname = Ticket::where('id', $request->company_name)->first();
            $employees   = Employee::where('id', $request->employee_name)->first();
            $health['mg_dl'] = $request->mgdl;
            $health['measure_type'] = $request->messure_type;
            $health['company_name'] = $user->name;
            $health['employee_name'] = $employees->name;
            $health['datetime'] = $request->time_slot;

            DB::table('glucose')->insert($health);

            return redirect()->route('glucose.index')->with('success', __('glucose successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }

    // public function store(Request $request)
    // {
    //     if (\Auth::user()->can('manage health')) {
    //         $validator = \Validator::make($request->all(), [
    //             'mgdl' => 'required',
    //             'messure_type' => 'required',
    //             'company_name' => 'required',
    //             'employee_name' => 'required',
    //             'time_slot' => 'required',
    //         ]);
    //         if ($validator->fails()) {
    //             $messages = $validator->getMessageBag();

    //             return redirect()->back()->with('error', $messages->first());
    //         }
    //         $companyname = Ticket::where('id', $request->company_name)->first();
    //         $employees   = Employee::where('id', $request->employee_name)->first();
    //         $health['mg_dl'] = $request->mgdl;
    //         $health['measure_type'] = $request->messure_type;
    //         $health['company_name'] = $companyname->company_name;
    //         $health['employee_name'] = $employees->name;
    //         $health['datetime'] = $request->time_slot;

    //         DB::table('glucose')->insert($health);

    //         return redirect()->route('glucose.index')->with('success', __('glucose successfully created.'));
    //     } else {
    //         return redirect()->back()->with('error', __('Permission denied.'));
    //     }
    // }
}
