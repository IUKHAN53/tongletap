<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\CustomField;
use App\Models\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile()
    {
        $userDetail = auth()->user();
        $userDetail->customField = CustomField::getData($userDetail, 'user');
        $customFields = CustomField::where('created_by', '=', auth()->user()->creatorId())->where('module', '=', 'user')->get();
        return view('employee.content.profile', compact('userDetail', 'customFields'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->validate(
            $request, [
                'name' => 'required|max:120',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]
        );
        if ($request->hasFile('profile')) {
            $filenameWithExt = $request->file('profile')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('profile')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            $dir = 'uploads/avatar/';
            $image_path = $dir . $user->avatar;

            if (File::exists($image_path)) {
                File::delete($image_path);
            }

            $path = Utility::upload_file($request, 'profile', $fileNameToStore, $dir, []);
            if ($path['flag'] != 1) {
                return redirect()->route('profile', auth()->user()->id)->with('error', __($path['msg']));
            }
        }

        if (!empty($request->profile)) {
            $user['avatar'] = $fileNameToStore;
        }
        $user['name'] = $request['name'];
        $user['email'] = $request['email'];
        $user->save();
        CustomField::saveData($user, $request->customField);

        return redirect()->route('employee.employee-profile-view', auth()->id())->with(
            'success', 'Profile successfully updated.'
        );
    }

    public function updatePassword(Request $request)
    {
        if (auth()->Check()) {
            $request->validate(
                [
                    'old_password' => 'required|current_password',
                    'password' => 'required|min:6',
                    'password_confirmation' => 'required|same:password',
                ],
                [
                    'old_password.required' => __('The old password field is required.'),
                    'old_password.current_password' => __('Old Password entered is wrong!'),
                    'password.required' => __('The password field is required.'),
                    'password_confirmation.required' => __('The confirm password field is required.'),
                ]
            );
            $request_data = $request->All();
            $obj_user = auth()->user();
            $obj_user->password = Hash::make($request_data['password']);;
            $obj_user->save();
            return redirect()->route('employee.employee-profile-view', auth()->id())->with('success', __('Password successfully updated.'));
        } else {
            return redirect()->route('employee.employee-profile-view', auth()->user()->id)->with('error', __('Something is wrong.'));
        }
    }

}
