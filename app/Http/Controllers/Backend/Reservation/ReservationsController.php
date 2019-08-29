<?php

namespace App\Http\Controllers\Backend\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Setting;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pending_reservations =  Reservation::pending()->get();
        $approved_reservations =  Reservation::approved()->get();

        return view('pages.backend.reservations.index', compact('approved_reservations', 'pending_reservations'));
    }

    public function create(Reservation $reservation)
    {
        
    }

    public function edit(Reservation $reservation)
    {
        return view('pages.backend.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
