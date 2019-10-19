<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Service;
use App\Reservation;
use Carbon\Carbon;

class AjaxDataController extends Controller
{
    public function services()
    {
        $services = Service::pluck('name');

        return $services;
    }

    public function get_services_sales_per_month($month)
    {
        $services = Service::with('reservations')->get();
        $reservations = Reservation::whereMonth('date',$month)->get();

        $service_arr = [];
        $total_arr = [];

        foreach($services as $service)
        {
            $total = 0;
            foreach($service->reservations as $reservation)
            {
                if($reservation->eventDate()->month == $month)
                {
                    $total += $reservation->payment->payment + $reservation->payment->transportation_charge;
                }
            }
            array_push($total_arr, $total);
        }
        $data = [
            $this->services(),
            $total_arr,
            'total_sales' => $this->services_sales_per_month($month),
        ];
        return $data;
    }

    public function services_sales_per_month($month)
    {
        $reservations = Reservation::whereMonth('date',$month)->get();

        $total_sales = 0;
        foreach($reservations as $reservation)
        {
            $total_sales += $reservation->payment->payment + $reservation->payment->transportation_charge;
        }

        return number_format($total_sales);
    }
}
