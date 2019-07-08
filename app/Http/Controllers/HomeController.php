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
        $offline_count = count(DB::table('bike_register')->where('regis_method','Offline')->get());
        $online_count = count(DB::table('bike_register')->where('regis_method','!=','Offline')->get());
        $offline_vip_count = count(DB::table('bike_register')->where('regis_method','Offline')->where('regis_donation','!=','500')->get());
        $online_vip_count = count(DB::table('bike_register')->where('regis_method','!=','Offline')->where('regis_donation','!=','500')->get());
        //cloth_recieve
        $vip_cloth_recieve = count(DB::table('bike_register')->where('regis_donation','!=','500')->where('cloth_recieve',true)->get());
        $vip_joining = count(DB::table('bike_register')->where('regis_donation','!=','500')->where('regis_joining','!=','nojoin')->get());
        
        $offline_normal_count = count(DB::table('bike_register')->where('regis_method','Offline')->where('regis_donation','500')->get());
        $normal_joining = count(DB::table('bike_register')->where('regis_donation','500')->where('regis_joining','!=','nojoin')->get());
        $normal_cloth_recieve = count(DB::table('bike_register')->where('regis_donation','500')->where('cloth_recieve',true)->get());

        $sizeCount = HomeController::sizeCounter();

        // $vip_pending = count(DB::table('bike_register')->where('regis_donation','!=','500')->where('regis_status','pending')->get());
        // $normal_pending = count(DB::table('bike_register')->where('regis_donation','500')->where('regis_status','pending')->get());
        return view('home')
        ->with('all_number',$all_count)
        ->with('million_number',$million_count)
        ->with('thousand_number',$thousand_count)
        ->with('hundred_number',$hundred_count)
        ->with('pending_number',$not_paid)
        ->with('online_number',$online_count)
        ->with('offline_number',$offline_count)
        ->with('vip_online',$online_vip_count)
        ->with('vip_offline',$offline_vip_count)
        ->with('vip_cloth_recieve',$vip_cloth_recieve)
        ->with('vip_join_count',$vip_joining)
        ->with('normal_offline',$offline_normal_count)
        ->with('normal_join_count',$normal_joining)
        ->with('normal_cloth_recieve',$normal_cloth_recieve)
        ->with('size',$sizeCount);
      
    }

    public function printInfo()
    {
        $all_count = count(DB::table('bike_register')->get());
        $million_count = count(DB::table('bike_register')->where('regis_donation','1000000')->get());
        $thousand_count = count(DB::table('bike_register')->where('regis_donation','5000')->get());
        $hundred_count = count(DB::table('bike_register')->where('regis_donation','500')->get());
        $not_paid = count(DB::table('bike_register')->where('regis_status','pending')->get());
        $offline_count = count(DB::table('bike_register')->where('regis_method','Offline')->get());
        $online_count = count(DB::table('bike_register')->where('regis_method','!=','Offline')->get());
        $offline_vip_count = count(DB::table('bike_register')->where('regis_method','Offline')->where('regis_donation','!=','500')->get());
        $online_vip_count = count(DB::table('bike_register')->where('regis_method','!=','Offline')->where('regis_donation','!=','500')->get());
        //cloth_recieve
        $vip_cloth_recieve = count(DB::table('bike_register')->where('regis_donation','!=','500')->where('cloth_recieve',true)->get());
        $vip_joining = count(DB::table('bike_register')->where('regis_donation','!=','500')->where('regis_joining','!=','nojoin')->get());
        
        $offline_normal_count = count(DB::table('bike_register')->where('regis_method','Offline')->where('regis_donation','500')->get());
        $normal_joining = count(DB::table('bike_register')->where('regis_donation','500')->where('regis_joining','!=','nojoin')->get());
        $normal_cloth_recieve = count(DB::table('bike_register')->where('regis_donation','500')->where('cloth_recieve',true)->get());

        $sizeCount = HomeController::sizeCounter();

        // $vip_pending = count(DB::table('bike_register')->where('regis_donation','!=','500')->where('regis_status','pending')->get());
        // $normal_pending = count(DB::table('bike_register')->where('regis_donation','500')->where('regis_status','pending')->get());
        return view('informationprint')
        ->with('all_number',$all_count)
        ->with('million_number',$million_count)
        ->with('thousand_number',$thousand_count)
        ->with('hundred_number',$hundred_count)
        ->with('pending_number',$not_paid)
        ->with('online_number',$online_count)
        ->with('offline_number',$offline_count)
        ->with('vip_online',$online_vip_count)
        ->with('vip_offline',$offline_vip_count)
        ->with('vip_cloth_recieve',$vip_cloth_recieve)
        ->with('vip_join_count',$vip_joining)
        ->with('normal_offline',$offline_normal_count)
        ->with('normal_join_count',$normal_joining)
        ->with('normal_cloth_recieve',$normal_cloth_recieve)
        ->with('size',$sizeCount);
      
    }

    public function sizeCounter(){
        $databaseQuery = DB::table('bike_register')->orderBy('id','ASC')->get();
        $size_ss = 0;
        $size_s = 0;
        $size_m = 0;
        $size_l = 0;
        $size_xl = 0;
        $size_2xl = 0;
        $size_3xl = 0;
        $blank = 0;
         foreach ($databaseQuery as $data) {
            $selectedSize = $data->regis_size;
            switch ($selectedSize) {
                case 'SS':$size_ss ++;break;
                case 'S':$size_s ++; break;
                case 'M':$size_m++;break;
                case 'L':$size_l++;break;
                case 'XL':$size_xl++;break;
                case '2XL':$size_2xl++;break;
                case '3XL':$size_3xl++;break;
                default:$blank++; break;
            }
        }
        $sizeAll =array($size_ss,$size_s,$size_m,$size_l,$size_xl,$size_2xl,$size_3xl);
        return $sizeAll; 
    }
}
