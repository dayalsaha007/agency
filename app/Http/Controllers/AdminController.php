<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Str;

class AdminController extends Controller
{

    /*admin_logout*/
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('ad_logout', 'Admin Logout Successfully!');
    }


    function profile()
    {

        $id = Auth::user()->id;
        $user_info = User::find($id);
        return view('backend.profile', [
            'user_info' => $user_info,
        ]);
    }

    function profile_edit($id)
    {
        $user_info = User::find($id);
        return view('backend.profile_edit', [
            'user_info' => $user_info,
        ]);
    }


    function update_profile(Request $request)
    {
        $user_id = $request->user_id;
        if ($request->profile_image == '') {
            if ($request->new_password == '') {

                User::find($user_id)->update([

                    'name' => $request->name,
                    'email' => $request->email,
                ]);
                return redirect()->route('profile')->with('up_pwop', 'Name &  Email Updated successfully!');
            } else {

                if (Hash::check($request->old_password, Auth::user()->password)) {


                    User::find($user_id)->update([

                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->new_password),
                    ]);

                    return redirect()->route('profile')->with('up_pwp', 'Name, Email & pass Updated successfully!');
                } else {

                    return redirect()->route('profile')->with('dmatch', 'Password does not matched!');
                }
            }
        } else {

            if ($request->new_password == '') {
                // $present_images = User::find($user_id);
                // $delete_from = public_path('uploads/profile_image/' . $present_images->profile_image);
                // unlink($delete_from);


                $profile_image = $request->profile_image;
                $ext = $profile_image->getClientOriginalExtension();
                $file_name = Str::lower(Auth::user()->id).'.'.$ext;
                Image::make($profile_image)->save(public_path('uploads/profile_image/'.$file_name));


                User::find($user_id)->update([

                    'name' => $request->name,
                    'email' => $request->email,
                    'profile_image' => $file_name,
                ]);

                return redirect()->route('profile')->with('image_up', 'Image Updated Successfully!');
            } else {

                if (Hash::check($request->old_password, Auth::user()->password)) {

                    // $present_images = User::find($user_id);
                    // $delete_from = public_path('uploads/profile_image/' . $present_images->profile_image);
                    // unlink($delete_from);


                    $profile_image = $request->profile_image;
                    $ext = $profile_image->getClientOriginalExtension();
                    $file_name = Str::lower(Auth::user()->id).'.'.$ext;
                    Image::make($profile_image)->save(public_path('uploads/profile_image/'.$file_name));


                    User::find($user_id)->update([

                        'name' => $request->name,
                        'email' => $request->email,
                        'password' => Hash::make($request->new_password),
                        'profile_image' => $file_name,
                    ]);

                    return redirect()->route('profile')->with('up_profile', 'Profile Updated successfully!');
                }
                 else
                  {

                    return redirect()->route('profile')->with('dmatch', 'Password does not matched!');
                }
            }
        }
    }






}
