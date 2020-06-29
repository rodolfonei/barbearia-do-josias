<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schedule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra o dashboard da aplicação.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check se o usuário é o admin (user id = 1)
        if (auth()->user()->id == 1) {
          $schedules = Schedule::all();
        } else {
          $schedules = auth()->user()->schedules->sortBy('scheduled_to');
        }
        return view('home', compact('schedules'));
    }
}
