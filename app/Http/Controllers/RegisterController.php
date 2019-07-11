<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BibController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class RegisterController extends BibController {
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
        $input_username = $request->input('input_username');
        $regis_prefix = $request->input('regis_prefix');
        $regis_name = $request->input('regis_name');
        $regis_surname = $request->input('regis_surname');
        $regis_date = $request->input('regis_date');
   
        $regis_peopleid = $request->input('regis_peopleid');
        if($regis_peopleid == NULL){
            $regis_peopleid ="-";
        }
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
		$regis_joining = $request->input('regis_joining');
        $money_numberic = $request->input('money_numberic');
        $money_alphabet = $request->input('money_alphabet'); 
        $regis_cloth = $request->input('regis_cloth'); 
        $regis_medal_recieve = $request->input('regis_medal_recieve'); 
        $regis_sex = $request->input('regis_sex');
        //Generate BIB (ID for Biking) or not, Generate only success payment
        if($regis_prefix == "ด.ช." || $regis_prefix == "นาย" ){
            $regis_sex="ชาย";
        }
        if($regis_prefix == "ด.ญ." || $regis_prefix == "นาง" || $regis_prefix == "น.ส." ){
            $regis_sex="หญิง";
        }
        else{
            $regis_sex="อื่นๆ";
        }
        if($regis_status == "success"){
            $bibId = BibController::generateBib($regis_donation);
        }
        else{
            $bibId = NULL;
        }

        if($money_alphabet != NULL&& $money_numberic != NULL)
        {
            $donation_alphabet = $money_alphabet;
            $donation_numberic = $money_numberic;
			 // Checking if it not in mindset  
			if($money_numberic != $regis_donation){
				if($money_numberic <= 4999)
					$regis_donation = 500;
				else if($money_numberic >= 5000 && $money_numberic <=999999)
					$regis_donation = 5000;
				else if($money_numberic >= 1000000)
					$regis_donation = 1000000;
			}
        }
		
        else{
            $donation_numberic = $regis_donation;
            if($donation_numberic == "1000000")
                $donation_alphabet="หนึ่งล้านบาทถ้วน";
            if($donation_numberic == "5000")
                $donation_alphabet="ห้าพันบาทถ้วน";
            if($donation_numberic == "500")
                $donation_alphabet="ห้าร้อยบาทถ้วน";
        }
		
		
		
        //Insert Into Database
        DB::table('bike_register')->insert(
            [
            'input_user' => $input_username,
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
            'regis_size' => $regis_size,
            'donate_value' => $donation_numberic,
            'donate_alphabet' => $donation_alphabet,
            'cloth_recieve'=>$regis_cloth,
              'regis_joining'=>$regis_joining,
              'medal_recieve'=>$regis_medal_recieve
            ]
        );
        return Redirect::to('/home/view/reverse');
    }

    

}
