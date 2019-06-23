<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;


class BikeController extends Controller {
    public function register(){
        return view('registerbike');
    }
    public function confirmRegister(Request $request){
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

        if($regis_status == "success"){
            $bibId = BikeController::generateBib($regis_donation);
        }
        else{
            $bibId = NULL;
        }

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

    public function generateBib($donate){
        if($donate == "1000000"){
            DB::table('bike_million')->insert([
                'status_use' => true
            ]);
            $bibId = DB::table('bike_million')->where('status_use',true)->orderBy('id','DESC')->first();
            return $bibId;
        }
        if($donate == "5000"){
            DB::table('bike_thousand')->insert([
                'status_use' => true
            ]);
            $bibId = DB::table('bike_thousand')->where('status_use',true)->orderBy('id','DESC')->first();
            return $bibId;
        }
        if($donate == "500"){
            DB::table('bike_hundred')->insert([
                'status_use' => true
            ]);
            $bibId = DB::table('bike_hundred')->where('status_use',true)->orderBy('id','DESC')->first();
            return $bibId;
        }
    }

    public function viewResult(){
        $regisData = DB::table('bike_register')->orderBy('id','ASC')->get();
        return view('view')->with('data',$regisData)
        ->with('describe',NULL);
    }

    public function viewSpecific($money){
        //Data Fetching From Database
        if($money == "million"){
            $regisData = DB::table('bike_register')->where('regis_donation','1000000')->orderBy('id','ASC')->get();
            $describe ="สำหรับผู้บริจาคเงิน 1,000,000 บาท";
        }
        if($money == "thousand"){
            $regisData = DB::table('bike_register')->where('regis_donation','5000')->orderBy('id','ASC')->get();
            $describe ="สำหรับผู้บริจาคเงิน 5,000 บาท";
        }
        if($money == "hundred"){
            $regisData = DB::table('bike_register')->where('regis_donation','500')->orderBy('id','ASC')->get();
            $describe ="สำหรับผู้บริจาคเงิน 500 บาท";
        }
        return view('view')->with('data',$regisData)
        ->with('describe',$describe);
    }

    //Handle to edit page
    public function editRecord($id){
        $data = DB::table('bike_register')->where('id',$id)->first();
        return view('edit')->with('data',$data);
    }

    public function editRegisterActive(Request $request){

        //Data Input
        $regis_id = $request->input('regis_id');
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
        $bib_status = $request->input('bib_status');

        //If success payment but not bib generating (Success Payment at this edit)
        if($regis_status == "success" && $bib_status =="" ){
            $bibId = BikeController::generateBib($regis_donation);
            DB::table('bike_register')->where('id',$regis_id)->
            update(
                [
                'bib_id' => $bibId,
                'regis_status' => $regis_status,
                'regis_prefix' => $regis_prefix,
                'regis_name' => $regis_name,
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
        }
        //If Bib is now successful generated or nothing change about bib Using This Query
        else{
            DB::table('bike_register')->where('id',$regis_id)->
            update(
                [
                'regis_status' => $regis_status,
                'regis_prefix' => $regis_prefix,
                'regis_name' => $regis_name,
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
        }
        return Redirect::to('/home/view');
    }

    public function deleteRecord($id){
        if (Auth::check()) {
            DB::table('bike_register')->where('id',$id)->delete();
            echo "<script>alert('Successfull Deleting การลบข้อมูลสำเร็จ');</script>";
            return Redirect::to('/home/view');
        }
        else{
            echo "<script>alert('ไม่สามารถที่จะลบได้ เนื่องจากคุณไม่มีสิทธิในการลบ กรุณาเข้าสู่ระบบ');</script>";
            return Redirect::to('/home/view');
        }
    }
}
