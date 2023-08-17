<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Film;
use App\Models\Hall;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $halls = ['halls' => Hall::get()];
        $films = ['films' => Film::get()];
        return view('client', $halls, $films);
    }
    public function choice(Hall $hall, Film $film, $date, $time)
    {

        $d = Booking::all();



        foreach ($d as $el) {
            if (sizeof($d) > 0 && $el->film_id == $film->id && $el->hall_id == $hall->id && $el->date == $date && $el->time == $time) {
                return view('clientChooseChairs', ['hall' => $hall, 'film' => $film, 'bookings' => $el]);
            }
        }

        $bookings =  Booking::create([
            'hall_id' => $hall->id,
            'film_id' => $film->id,
            'date' => $date,
            'chairs' => $hall->chairs,
            'time' => $time
        ]);

        return view('clientChooseChairs', ['hall' => $hall, 'film' => $film, 'bookings' => $bookings]);
    }

    public function clientPay(Request $request)
    {
        $film = Film::find($request->film);
        $hall = Hall::find($request->hall);
        $bookings = Booking::find($request->bookings);
        $bookings->chairs = $request->clientAddChairs;
        $bookings->save();
        $price = $request->price;
        $chairPay = $request->chairPay;
        return view('clientPay', ['film' => $film, 'hall' => $hall, 'bookings' => $bookings, 'price' => $price, 'chairPay' => $chairPay]);
    }
}
