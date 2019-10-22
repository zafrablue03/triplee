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

    public function get_services_data_sales_per_month($month)
    {
        $services = Service::with('reservations')->get();
        $total_arr = [];

        foreach($services as $service)
        {
            $total = 0;
            foreach($service->reservations as $reservation)
            {
                if($reservation->payment)
                {
                    if($reservation->eventDate()->month == $month)
                    {
                        $data = $reservation->payment->is_paid ? $reservation->payment->payment : $reservation->payment->payment + $reservation->payment->transportation_charge;
                        $total += $data;
                    }
                }
            }
            array_push($total_arr, $total);
        }
        $data = [
            $this->services(),
            $total_arr,
            'total_sales' => $this->total_services_sales_per_month($month),
        ];
        return $data;
    }

    public function total_services_sales_per_month($month)
    {
        $reservations = Reservation::whereMonth('date',$month)->get();

        $total_sales = 0;
        foreach($reservations as $reservation)
        {
            if($reservation->payment)
            {
                $data = $reservation->payment->is_paid ? $reservation->payment->payment : $reservation->payment->payment + $reservation->payment->transportation_charge;
                $total_sales += $data;
            }
        }

        return number_format($total_sales);
    }
}
