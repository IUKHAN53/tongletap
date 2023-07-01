<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class HealthJourneyController extends Controller
{
    public function company_choice()
    {
        if (\Auth::user()->can('manage health')) {
            $companyname = Ticket::where('company_name', '!=', '')->get()->pluck('company_name', 'company_name');
            $employees   = Employee::all()->pluck('name', 'name');
            return view('health.companies', compact('companyname', 'employees'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
    
    
    
    
    public function index(Request $request)
{
    if (\Auth::user()->can('manage health')) {
        $user = auth()->user();
        $companyName = $user->name;
        $query = DB::table('blood_pressure')->orderBy('id', 'DESC');
        // echo($companyName);

        if ($companyName != 'Super Admin') {
            $query->where('company_name', $companyName)
                ->orderBy('id', 'DESC')
                ->get();
                // $bloodPressures = $query->get();
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
        // else {
        //     $query = DB::table('blood_pressure')->orderBy('id', 'DESC')->get();
        //     // $bloodPressures = $query->get();
        // }
        $bloodPressures = $query->get();
        return view('health.index', compact('bloodPressures'));
    } 
    // if (\Auth::user()->can('manage health')) {
    //         $query = DB::table('blood_pressure')->orderBy('id', 'DESC');
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

    //     $bloodPressures = $query->get();
    //     //  dd($bloodPressures);
    //         return view('health.index', compact('bloodPressures'));
    //     } 
    else {
        return redirect()->back()->with('error', __('Permission denied.'));
    }
}
    
    // public function index(Request $request)
    // {
        // if (\Auth::user()->can('manage health')) {
        //     $query = DB::table('blood_pressure')->orderBy('id', 'DESC');
        //     // dd($query);

        //     if ($request->has('company_name')) {
        //         $companyName = $request->input('company_name');
        //         if($companyName!=''){
        //         $query->where('company_name', $companyName);
        //         }
        //     }
    
        //     if ($request->has('employee_name')) {
        //         $employeeName = $request->input('employee_name');
        //         if($employeeName!=''){
        //         $query->where('employee_name', $employeeName);
        //         }
        //     }

        // $bloodPressures = $query->get();
        // //  dd($bloodPressures);
        //     return view('health.index', compact('bloodPressures'));
        // } else {
        //     return redirect()->back()->with('error', __('Permission denied.'));
        // }
    // }

    public function create()
    {
        if (\Auth::user()->can('manage health')) {
            $companyname = Ticket::where('company_name', '!=', '')->get()->pluck('company_name', 'id');
            $employees   = Employee::all()->pluck('name', 'id');
            return view('health.create', compact('companyname', 'employees'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if (\Auth::user()->can('manage health')) {
            $validator = \Validator::make($request->all(), [
                'sys' => 'required',
                'dia' => 'required',
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
            echo($employees);
            echo($user->name);
            $health['sys'] = $request->sys;
            $health['dia'] = $request->dia;
            $health['company_name'] = $user->name;
            $health['employee_name'] = $employees->name;
            $health['datetime'] = $request->time_slot;

            DB::table('blood_pressure')->insert($health);

            return redirect()->route('health.index')->with('success', __('Bloodpressure successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
