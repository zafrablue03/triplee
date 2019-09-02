<?php

namespace App\Http\Controllers\Frontend\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Spam;
use Carbon\Carbon;

class ReservationsController extends Controller
{

    public function checkIfSpamming($email, $date)
    {
        return Reservation::whereEmail($email)
        ->whereDay('created_at', Carbon::now()->day)
        ->where('date',$date)
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
        if($this->checkIfSpamming($request->email, $request->date))
        {
            Spam::create($request->all());
            return redirect()->back()->withError('Sorry! You already have a pending reservation with the same booking date. We will contact you as soon as possible!');
        }
        $request->validate([
            'date'          =>  'date_format:Y-m-d|required',
            'name'          =>  'required|min:2|max:50',
            'email'         =>  'required|email|min:3|max:80',
            'contact'       =>  'required|numeric|digits_between:11,15',
            'service_id'    =>  'required',
            'message'       =>  ''
        ]);

        Reservation::create($request->except('_token'));

        return redirect()->back()->withSuccess('Thank you!');
    }
}
