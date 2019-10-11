<?php

namespace App\Http\Controllers\Backend\Users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    public function addStaff(Request $request)
    {
        $request->validate([
            'name'  =>  'required|min:2|max:50',
            'email' =>  'required|min:2|max:90|unique:users,email'
        ]);
        $password = bcrypt('tripleestaff2019');

        User::create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  $password,
            'is_admin'  =>  true
        ]);

        return redirect()->route('profile.index')->withSuccess('Staff added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
