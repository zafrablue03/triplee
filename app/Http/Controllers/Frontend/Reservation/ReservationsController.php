<?php

namespace App\Http\Controllers\Frontend\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Spam;
use Carbon\Carbon;

class ReservationsController extends Controller
{

    public function checkEmail($email)
    {
        return Reservation::where('email',$email)
        ->whereDay('created_at', Carbon::now()->day)
        ->exists();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if($this->checkEmail($request->email))
        {
            Spam::create($request->all());
            return redirect()->back()->withError('Sorry! Email has already a pending reservation for today. Try again tommorrow!');
        }
        $request->validate([
            'date'          =>  'date_format:Y-m-d|required',
            'name'          =>  'required|min:2|max:50',
            'email'         =>  'required|email|min:3|max:80',
            'contact'       =>  'required|numeric|digits_between:11,15',
            'service_id'    =>  'required',
            'message'       =>  ''
        ]);
        // dd($request->except('_token'));

        Reservation::create($request->except('_token'));

        return redirect()->back()->withSuccess('Thank you!');
    }
}
