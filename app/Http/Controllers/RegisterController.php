<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BibController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class BikeController extends Controller {
    /**
     * ---------------
     * Register Controller 
     * First For Rander the Register For biking Page
     * Second for handling value for registing biker information
     * -----------------------------
     */
    public function register(){
        return view('registerbike');
    }

    public function confirmRegister(Request $request){ 

        //Data Fetching from 'Form' Input
        $regis_prefix = $request->input('regis_prefix');
        $regis_name = $request->input('regis_name');
        $regis_surname = $request->input('regis_surname');
        $regis_date = $request->input('regis_date');
        $regis_sex = $request->input('regis_sex');
        $regis_peopleid = $request->input('regis_peopleid');
        $regis_call = $request->input('regis_call');
        $regis_email = $request->input('regis_email');
        $regis_address = $request->input('regis_address');
        $regis_province = $request->input('regis_province');
        $regis_nationality = $request->input('regis_nationality');
        $regis_country = $request->input('regis_country');
        $regis_team = $request->input('regis_team');
        $regis_contact = $request->input('regis_contact');
        $regis_contactcall = $request->input('regis_contactcall');
        $regis_donation = $request->input('regis_donation');
        $sou_shield = $request->input('sou_shield');
        $sou_medal = $request->input('sou_medal');
        $regis_size = $request->input('regis_size');
        $regis_status = $request->input('regis_status');

        //Generate BIB (ID for Biking) or not, Generate only success payment
        if($regis_status == "success"){
            $bibId = BibController::generateBib($regis_donation);
        }
        else{
            $bibId = NULL;
        }

        //Insert Into Database
        DB::table('bike_register')->insert(
            [
            'regis_prefix' => $regis_prefix,
            'regis_name' => $regis_name,
            'bib_id' => $bibId,
            'regis_status' => $regis_status,
            'regis_surname' => $regis_surname,
            'regis_date' => $regis_date,
            'regis_peopleid' => $regis_peopleid,
            'regis_call' => $regis_call,
            'regis_sex' => $regis_sex,
            'regis_email' => $regis_email,
            'regis_address' => $regis_address,
            'regis_province' => $regis_province,
            'regis_nationality' => $regis_nationality,
            'regis_country' => $regis_country,
            'regis_team' => $regis_team,
            'regis_contact' => $regis_contact,
            'regis_contactcall' => $regis_contactcall,
            'regis_donation' => $regis_donation,
            'regis_shield' => $sou_shield,
            'regis_medal' => 'YES',
            'regis_size' => $regis_size
            ]
        );
        return Redirect::to('/home');
    }

    

}
