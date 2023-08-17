<?php

namespace App\Http\Controllers;

use App\Models\Hall;
use App\Models\Film;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $halls = ['halls' => Hall::get()];
        $films = ['films' => Film::get()];
        return view('admin', $halls, $films);
    }
    public function addHall(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);
        Hall::firstOrCreate(['name' => $request->name]);
        return redirect()->route('admin');
    }
    public function dellHall(Hall $hall)
    {
        $hall->delete();
        return redirect()->route('admin');
    }
    public function confHall(Request $request, Hall $hall)
    {
        $request->validate([
            'row' => 'required',
            'chair' => 'required',
            'chairs' => 'required|array',
        ]);
        $hall->fill([
            'row' => $request->row,
            'chair' => $request->chair,
            'chairs' => $request->chairs
        ]);
        $hall->save();
        return redirect()->route('admin');
    }
    public function confPrice(Request $request, Hall $hall)
    {
        $request->validate([
            'price' => 'required',
            'priceVip' => 'required',
        ]);
        $hall->fill([
            'price' => $request->price,
            'priceVip' => $request->priceVip
        ]);
        $hall->save();
        return redirect()->route('admin');
    }
    public function addFilm(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'lenght' => 'required',
            'country' => 'required',
            'description' => 'required',
        ]);
        Film::firstOrCreate([
            'name' => $request->name,
            'lenght' => $request->lenght,
            'country' => $request->country,
            'description' => $request->description
        ]);
        return redirect()->route('admin');
    }
    public function dellFilm(Film $film)
    {
        $film->delete();
        return redirect()->route('admin');
    }
    public function addSession(Request $request, Hall $hall)
    {
        $hall->films()->attach($request->film, ['time' => $request->timeSession]);
        return redirect()->route('admin');
    }
    public function dellFilmSession(Request $request, Hall $hall)
    {
        $hall->films()->wherePivot('time', $request->filmTime)->detach();
        return redirect()->route('admin');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
