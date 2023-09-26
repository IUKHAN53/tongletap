<?php

namespace App\Http\Controllers;

use App\Models\Assessments;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AssessmentController extends Controller
{
    public function index()
    {
        $assessments = Assessments::query()->get();
        $layout = strtolower(auth()->user()->type) === 'employee' ? 'layouts.employee' : 'layouts.admin';
        return view('assessment.index', compact('assessments', 'layout'));
    }

    public function create()
    {
        return view('assessment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url' => 'required',
            'description' => 'nullable'
        ]);
//        if ($request->hasFile('image')) {
//            $filenameWithExt = $request->file('image')->getClientOriginalName();
//            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
//            $extension = $request->file('image')->getClientOriginalExtension();
//            $fileNameToStore = 'assessment_' . $filename . '_' . time() . '.' . $extension;
//
//            $dir = 'uploads/assessments/';
//            $path = Utility::upload_file($request, 'image', $fileNameToStore, $dir, []);
//            if ($path['flag'] != 1) {
//                return redirect()->route('assessments')->with('error', __($path['msg']));
//            }
//        } else {
        $count = Assessments::query()->count();
        $request->merge([
            'image' => 'https://picsum.photos/150?random=' . $count + 1,
        ]);
//        }

        Assessments::create($request->all());

        return redirect()->route('assessments')
            ->with('success', 'Assessment created successfully.');
    }
}
