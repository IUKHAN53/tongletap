<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MentalWellnessController extends Controller
{
    public function employee()
    {
        $videos = \App\Models\VideoLibrary::all();
        return view('employee.content.mental_wellness.index', compact('videos'));
    }

    public function company()
    {
        if (auth()->user()->type == 'company') {
            $videos = \App\Models\VideoLibrary::all();
            return view('mental_wellness.index', compact('videos'));
        } else {
            return redirect()->back()->with('error', __('Permission denied.'));
        }
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
                'url' => 'required',
            ]);

            if ($request->hasFile('thumbnail')) {
                $thumbnail = $request->file('thumbnail');
                $thumbnail_name = 'thumbnail-' . time() . '.' . $thumbnail->getClientOriginalExtension();
                $thumbnail->move(public_path('uploads/thumbnails'), $thumbnail_name);
            } else {
                $thumbnail_name = null;
            }
            $embeddableUrl = $this->convertToEmbedUrl($request->url); // Convert URL to embed URL

            $video = new \App\Models\VideoLibrary();
            $video->title = $request->title;
            $video->url = $embeddableUrl;
            $video->thumbnail = $thumbnail_name;
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

    function convertToEmbedUrl($url) {
        $parsed_url = parse_url($url);

        if ($parsed_url['host'] == 'www.youtube.com' || $parsed_url['host'] == 'youtube.com') {
            parse_str($parsed_url['query'], $query_array);
            return 'https://www.youtube.com/embed/' . $query_array['v'];
        } elseif ($parsed_url['host'] == 'www.vimeo.com' || $parsed_url['host'] == 'vimeo.com') {
            $vimeo_id = substr($parsed_url['path'], 1); // Remove leading slash
            return 'https://player.vimeo.com/video/' . $vimeo_id;
        } else {
            return $url; // If the URL type is not supported, leave it as is
        }
    }

    public function getChecklists()
    {

    }


}
