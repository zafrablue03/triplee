<?php

namespace App\Http\Controllers\Backend\Reservation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Reservation;
use App\Setting;
use Carbon\Carbon;

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
        $now = Carbon::now();

        return view('pages.backend.reservations.index', compact('approved_reservations', 'pending_reservations', 'now'));
    }

    public function create(Reservation $reservation)
    {
        return view('pages.backend.reservations.create');
    }


    public function store(Request $request)
    {
        $reservation = new Reservation();
        $course = $reservation->getCourseArray($request->course);

        $request->validate([
            'date'          =>  'date_format:Y-m-d|required',
            'name'          =>  'required|min:2|max:50',
            'email'         =>  'required|email|min:3|max:80',
            'contact'       =>  'required|numeric|digits_between:11,15',
            'venue'         =>  'required|min:2|max:90',
            'pax'           =>  'required|numeric|min:10',
            'service_id'    =>  'required',
            'set_id'        =>  'required',
        ]);

        Reservation::create(array_merge(
            $request->except('_token', 'finish'),
            ['is_approved' => 1]
        ))->courses()->attach($course);

        return redirect()->route('reservation.index')->withSuccess('Reservation approved!');
    }

    public function show(Reservation $reservation)
    {
        return view('pages.backend.reservations.show', compact('reservation'));
    }

    public function edit(Reservation $reservation)
    {
        return view('pages.backend.reservations.edit', compact('reservation'));
    }

    public function update(Request $request, Reservation $reservation)
    {       
        $course = $reservation->getCourseArray($request->course);

        $request->validate([
            'date'          =>  'date_format:Y-m-d|required',
            'name'          =>  'required|min:2|max:50',
            'email'         =>  'required|email|min:3|max:80',
            'contact'       =>  'required|numeric|digits_between:11,15',
            'venue'         =>  'required|min:2|max:90',
            'pax'           =>  'required|numeric|min:10',
            'service_id'    =>  'required',
            'set_id'        =>  'required',
        ]);
        
        $reservation->update(array_merge(
            $request->except('_token', 'finish'),
            ['is_approved' => 1]
        ));
        $reservation->courses()->sync($course);

        return redirect()->route('reservation.index')->withSuccess('Reservation approved!');
    }


    
    public function destroy(Request $request, Reservation $reservation)
    {
        if($request->get('approved') === 'cancel')
        {
            $reservation->is_approved = false;
            $reservation->courses()->detach();
            $reservation->save();
            return redirect()->route('reservation.index')->withSuccess('Reservation cancelled!');
        }
    }

    public function streamPDF(Reservation $reservation)
    {
        $total = $reservation->payable();
        $date = Carbon::parse($reservation->date)->toFormattedDateString();
        $pdf = \PDF::loadView('pages.backend.reservations.partials.contract-pdf', compact('reservation', 'date', 'total'))->setPaper('a4', 'portrait');
        return $pdf->stream('test.pdf');
    }
}
