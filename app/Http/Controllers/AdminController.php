<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Payable;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function now()
    {
        return Carbon::now();
    }

    public function admin()
    {
        $now = $this->now();
        $customersCount = Reservation::whereIsApproved(true)->whereMonth('date',$now->month)->sum('pax');
        $approved = Reservation::whereIsApproved(true)->whereMonth('date',$now->month)->count();
        $pending = Reservation::whereIsApproved(false)->whereMonth('date',$now->month)->count();
        
        $revenue = $this->total_payment_payable_reservation_by_month('payment');
        $expected_monthly_revenue = $this->total_payment_payable_reservation_by_month('payable');


        return view('pages.backend.index', compact('customersCount', 
        'approved', 'pending', 'revenue', 'expected_monthly_revenue', 'now'));
    }

    public function total_payment_payable_reservation_by_month($params)
    {
        $month = $this->now()->month;
        $reservations = Reservation::whereMonth('date', $month)->whereIsApproved(true)->get();

        $total_for_this_month = 0;

        foreach($reservations as $reservation)
        {
            $data = $params === 'payable' ? $reservation->payment->$params : $reservation->payment->$params + $reservation->payment->transportation_charge;
            $total_for_this_month +=  $data;
        }

        return $total_for_this_month;
    }
}
