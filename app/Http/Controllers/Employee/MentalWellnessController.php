<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentalWellnessController extends Controller
{
    public function employee()
    {
        $videos = \App\Models\VideoLibrary::all();
        return view('employee.content.mental_wellness.index');
    }

    public function company()
    {
        $videos = \App\Models\VideoLibrary::all();
        return view('employee.mental_wellness.index');
    }

    public function manageVideos()
    {
        if (auth()->user()->type == 'super admin') {
            $videos = \App\Models\VideoLibrary::all();
            return view('admin.manage-videos', compact('videos'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function addVideo(Request $request)
    {
        if (auth()->user()->type == 'super admin') {
            $request->validate([
                'title' => 'required',
                'url' => 'required'
            ]);

            $video = new \App\Models\VideoLibrary();
            $video->title = $request->title;
            $video->url = $request->url;
            $video->save();

            return redirect()->back()->with('success', 'Video added successfully');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

    public function deleteVideo(Request $request, $id)
    {
        if (auth()->user()->type == 'super admin') {
            $video = \App\Models\VideoLibrary::find($id);
            $video->delete();
            return redirect()->back()->with('success', 'Video deleted successfully');
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }

    }

}
