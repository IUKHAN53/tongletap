<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\BloodPressure;
use App\Models\Exercise;
use App\Models\Glucose;
use App\Models\Sleep;
use App\Models\Weight;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HealthJourneyController extends Controller
{
    public function health(Request $request)
    {
        $bloodPressures = DB::table('blood_pressure')->where('employee_name', auth()->user()->name)
            ->where('company_name', auth()->user()->ownerDetails()->name)
            ->orderBy('id', 'DESC')->get();
        return view('employee.content.health.blood_pressure.index', compact('bloodPressures'));
    }

    public function createHealth(Request $request)
    {
        return view('employee.content.health.blood_pressure.create');
    }

    public function storeHealth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sys' => 'required',
            'dia' => 'required',
            'time_slot' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $bp = [
            'sys' => $request->sys,
            'dia' => $request->dia,
            'company_name' => auth()->user()->ownerDetails()->name,
            'employee_name' => auth()->user()->name,
            'datetime' => $request->time_slot,
        ];

        BloodPressure::create($bp);
        return redirect()->route('employee.health')->with('success', __('Blood Pressure successfully created.'));
    }

    public function glucose(Request $request)
    {
        $glucose = DB::table('glucose')->where('employee_name', auth()->user()->name)
            ->where('company_name', auth()->user()->ownerDetails()->name)
            ->orderBy('id', 'DESC')->get();
        return view('employee.content.health.glucose.index', compact('glucose'));
    }

    public function createGlucose(Request $request)
    {
        return view('employee.content.health.glucose.create');
    }

    public function storeGlucose(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mg_dl' => 'required',
            'measure_type' => 'required',
            'datetime' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $glucose = [
            'mg_dl' => $request->mg_dl,
            'measure_type' => $request->measure_type,
            'company_name' => auth()->user()->ownerDetails()->name,
            'employee_name' => auth()->user()->name,
            'datetime' => $request->datetime,
        ];
        Glucose::create($glucose);
        return redirect()->route('employee.glucose')->with('success', __('glucose successfully created.'));
    }

    public function exercise(Request $request)
    {
        $exercises = DB::table('exercise')->where('employee_name', auth()->user()->name)
            ->where('company_name', auth()->user()->ownerDetails()->name)
            ->orderBy('id', 'DESC')->get();
        return view('employee.content.health.exercise.index', compact('exercises'));
    }

    public function createExercise(Request $request)
    {
        return view('employee.content.health.exercise.create');

    }

    public function storeExercise(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'exercise' => 'required',
            'exercise_type' => 'required',
            'time_slot' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $exercise = [
            'exercise_time' => $request->exercise,
            'exercise_type' => $request->exercise_type,
            'company_name' => auth()->user()->ownerDetails()->name,
            'employee_name' => auth()->user()->name,
            'datetime' => $request->time_slot,
        ];
        Exercise::create($exercise);
        return redirect()->route('employee.exercise')->with('success', __('exercise successfully created.'));
    }

    public function weight(Request $request)
    {
        $weights = DB::table('weight')->where('employee_name', auth()->user()->name)
            ->where('company_name', auth()->user()->ownerDetails()->name)
            ->orderBy('id', 'DESC')->get();
        return view('employee.content.health.weight.index', compact('weights'));
    }

    public function createWeight(Request $request)
    {
        return view('employee.content.health.weight.create');
    }

    public function storeWeight(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'weight' => 'required',
            'time_slot' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $weight = [
            'weight' => $request->weight,
            'company_name' => auth()->user()->ownerDetails()->name,
            'employee_name' => auth()->user()->name,
            'datetime' => $request->time_slot,
        ];
        Weight::create($weight);
        return redirect()->route('employee.weight')->with('success', __('weight successfully created.'));
    }

    public function sleep(Request $request)
    {
        $sleeps = DB::table('sleep')->where('employee_name', auth()->user()->name)
            ->where('company_name', auth()->user()->ownerDetails()->name)
            ->orderBy('id', 'DESC')->get();
        return view('employee.content.health.sleep.index', compact('sleeps'));
    }

    public function createSleep(Request $request)
    {
        return view('employee.content.health.sleep.create');
    }

    public function storeSleep(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sleep' => 'required',
            'time_slot' => 'required',
        ]);
        if ($validator->fails()) {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }
        $sleep = [
            'sleep_hours' => $request->sleep,
            'company_name' => auth()->user()->ownerDetails()->name,
            'employee_name' => auth()->user()->name,
            'datetime' => $request->time_slot,
        ];
        Sleep::create($sleep);
        return redirect()->route('employee.sleep')->with('success', __('sleep successfully created.'));
    }

}
