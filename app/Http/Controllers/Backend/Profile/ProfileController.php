<?php

namespace App\Http\Controllers\Backend\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use App\User;
use App\Profile;
use App\Reservation;
use File;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $reservations = Reservation::approved()->orderBy('date', 'ASC')->get();

        return view('pages.backend.profile.user-profile', compact('user', 'reservations'));
    }
    
    public function edit(User $user)
    {
        return view('pages.backend.profile.edit', compact('user'));
    }

    public function checkImage($image)
    {
        return Profile::exists(storage_path('app/public/'.$image));
    }

    public function update(Request $request, User $user)
    {
        if($request->get('action') === 'user')
        {
            $request->validate([
                'name'                  =>  'required|min:2|max:80',
                'email'                 =>  'required|email|unique:users,email,'.$user->id,
            ]);

            $user->update($request->except('_token'));

            return redirect()->route('profile.edit', $user->id)->withSuccess('Profile updated successfully');
        }

        if($request->get('action') === 'profile')
        {
            $data = $request->validate([
                'about'     =>  'sometimes|min:2',
                'title'     =>  '',
                'image'     =>  'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:min_width=50,max_width=2000, min_height=50, max_height=2000',
                'facebook'  =>  '',
                'twitter'   =>  '',
                'instagram' =>  ''
            ]);

            $img_arr = [];

            if( request()->has('image') ){
                if($this->checkImage($user->profile->image)){
                    File::delete(storage_path('app/public/'. $user->profile->image));
                }
                $image = $request->file('image')->store('uploads','public');
                $imageFit = Image::make(public_path("storage/{$image}"))->fit(200,200);
                $imageFit->save();
                array_push($img_arr, ['image' => $image]);

                if($this->checkImage($user->profile->avatar)){
                    File::delete(storage_path('app/public/'. $user->profile->avatar));
                }

                $avatar = $request->file('image')->store('avatar','public');
                $avatarFit = Image::make(public_path("storage/{$avatar}"))->fit(50,50);
                $avatarFit->save();
                array_push($img_arr, ['avatar' => $avatar]);
            }

            $user->profile()->update(array_merge(
                $request->except('_token', '_method', 'action'),
                $img_arr[0] ?? [],
                $img_arr[1] ?? []
            ));
            return redirect()->route('profile.edit', $user->id)->withSuccess('Profile updated successfully');
        }
    }
}
