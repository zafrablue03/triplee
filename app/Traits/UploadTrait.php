<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\User;
use App\Profile;
use File;

trait UploadTrait
{
    public function checkImage($image)
    {
        return Profile::exists(public_path($image));
    }

    public function checkAvatar($avatar)
    {
        return Profile::exists(public_path($avatar));
    }

    public function uploadUserProfile(User $user, UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        if($this->checkImage($user->profile->image)){
            File::delete(public_path($user->profile->image));
        }
        if($this->checkAvatar($user->profile->avatar)){
            File::delete(public_path($user->profile->avatar));
        }

        $name = !is_null($filename) ? $filename : str_random(25);
        $avatarFolder = $folder.'/avatar';

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        $avatar = $uploadedFile->storeAs($avatarFolder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        $imageFit = Image::make(public_path($avatar))->fit(200,200);
        $imageFit->save();
        
        return $file;
    }
}