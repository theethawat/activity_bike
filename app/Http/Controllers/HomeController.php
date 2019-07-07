<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_count = count(DB::table('bike_register')->get());
        $million_count = count(DB::table('bike_register')->where('regis_donation','1000000')->get());
        $thousand_count = count(DB::table('bike_register')->where('regis_donation','5000')->get());
        $hundred_count = count(DB::table('bike_register')->where('regis_donation','500')->get());
        $not_paid = count(DB::table('bike_register')->where('regis_status','pending')->get());
        return view('home')
        ->with('all_number',$all_count)
        ->with('million_number',$million_count)
        ->with('thousand_number',$thousand_count)
        ->with('hundred_number',$hundred_count)
        ->with('pending_number',$not_paid);
    }
}
