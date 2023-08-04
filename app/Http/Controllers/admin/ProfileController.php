<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile.edit');
    }

    public function details(Request $request)
    {
        $admin = User::find(Auth::id());

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'unique:users,email,' . Auth::id() . ',id'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        $is_updated = $admin->update($data);

        $is_updated ? $message = ['success' => 'Profile details has been successfully updated!'] : $message = ['failure' => 'Profile details has failed to update!'];

        return back()->with($message);
    }

    public function picture(Request $request)
    {
        $admin = User::find(Auth::id());

        $request->validate([
            'picture' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        if (!empty(Auth::user()->profile_picture)) {
            unlink(public_path('template/img/avatars/' . Auth::user()->profile_picture));
        }

        $new_name = "ACI-" . microtime(true) . "." . $request->picture->extension();

        $request->picture->move(public_path('template/img/avatars'), $new_name);

        $data = [
            'profile_picture' => $new_name,
        ];

        $is_updated = $admin->update($data);

        $is_updated ? $message = ['success' => 'Profile Picture has been successfully updated!'] : $message = ['failure' => 'Profile Picture has failed to update!'];

        return back()->with($message);
    }

    public function password(Request $request)
    {
        $admin = User::find(Auth::id());

        $request->validate([
            'current_password' => ['required'],
            'password' => ['required', 'confirmed'],
        ]);

        if (Hash::check($request->current_password, Auth::user()->password)) {
            $data = [
                'password' => $request->password,
            ];

            $is_updated = $admin->update($data);

            $is_updated ? $message = ['success' => 'Password has been successfully updated!'] : $message = ['failure' => 'Password has failed to update!'];

            return back()->with($message);
        } else {
            return back()->withErrors([
                'current_password' => 'Incorrect current password!',
            ]);
        }
    }
}
