<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class WeightController extends Controller
{
    // public function index(Request $request)
    // {
    //     if (\Auth::user()->can('manage health')) {
    //         // $weights = DB::table('weight')->orderBy('id', 'DESC')->get();
    //         $query = DB::table('weight')->orderBy('id', 'DESC');
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

    //     $weights = $query->get();
    //         return view('weight.index', compact('weights'));
    //     } else {
    //         return redirect()->back()->with('error', __('Permission denied.'));
    //     }
    // }
    
    public function index(Request $request)
{
    
     if (\Auth::user()->can('manage health')) {
        $user = auth()->user();
        $companyName = $user->name;
        $query = DB::table('weight')->orderBy('id', 'DESC');

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
 $weights = $query->get();
        return view('weight.index', compact('weights'));
    } 
 else {
        return redirect()->back()->with('error', __('Permission denied.'));
    }
    
    
    // if (\Auth::user()->can('manage health')) {
    //     $user = auth()->user();
    //     $companyName = $user->name;
    //     // echo($companyName);

    //     if ($companyName) {
    //         $weights = DB::table('weight')
    //             ->where('company_name', $companyName)
    //             ->orderBy('id', 'DESC')
    //             ->get();
    //     } else {
    //         $weights = DB::table('weight')->orderBy('id', 'DESC')->get();
    //     }

    //     return view('weight.index', compact('weights'));
    // } else {
    //     return redirect()->back()->with('error', __('Permission denied.'));
    // }
}

    public function create()
    {
        if (\Auth::user()->can('manage health')) {
            $companyname = Ticket::where('company_name', '!=', '')->get()->pluck('company_name', 'id');
            $employees   = Employee::all()->pluck('name', 'id');
            return view('weight.create', compact('companyname','employees'));
        } else {
            return response()->json(['error' => __('Permission denied.')], 401);
        }
    }

    public function store(Request $request)
    {
        if (\Auth::user()->can('manage health')) {
            $validator = \Validator::make($request->all(), [
                'weight' => 'required',
                // 'company_name' => 'required',
                'employee_name' => 'required',
                'time_slot' => 'required',
            ]);
            if ($validator->fails()) {
                $messages = $validator->getMessageBag();

                return redirect()->back()->with('error', $messages->first());
            }
            $user = auth()->user();
            $companyname = Ticket::where('id', $request->company_name)->first();
            $employees   = Employee::where('id', $request->employee_name)->first();
            $health['weight'] = $request->weight;
            $health['company_name'] = $user->name;
            $health['employee_name'] = $employees->name;
            $health['datetime'] = $request->time_slot;

            DB::table('weight')->insert($health);

            return redirect()->route('weight.index')->with('success', __('weight successfully created.'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
    }
}
