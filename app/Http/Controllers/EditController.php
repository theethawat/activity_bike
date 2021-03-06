<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\BibController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class EditController extends BibController
{
    /**
     * -------------------------------
     * Edit Controller
     * Using by fetching data from database to View and let user use
     * POST method to send that data again with edited whatever user want to edit
     * ----------------------------------- 
     */


    //Handle to edit page
    public function editRecord($id)
    {
        $data = DB::table('bike_register')->where('id', $id)->first();
        return view('edit')->with('data', $data);
    }

    //Active Edit Data
    public function editRegisterActive(Request $request)
    {

        //Data Input
        $input_username = $request->input('input_username');
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
        $money_numberic = $request->input('money_numberic');
        $money_alphabet = $request->input('money_alphabet');
        $regis_cloth = $request->input('regis_cloth');
        $regis_joining = $request->input('regis_joining');
        $regis_medal_recieve = $request->input('regis_medal_recieve');

        if ($money_numberic != $regis_donation) {
            if ($money_numberic <= 4999)
                $regis_donation = 500;
            else if ($money_numberic >= 5000 && $money_numberic <= 999999)
                $regis_donation = 5000;
            else if ($money_numberic >= 1000000)
                $regis_donation = 1000000;
        }
        //If success payment but not bib generating (Success Payment at this edit)
        if ($regis_status == "success" && $bib_status == "") {
            $bibId = BibController::generateBib($regis_donation);
            DB::table('bike_register')->where('id', $regis_id)->update(
                [
                    'input_user' => $input_username,
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
                    'regis_size' => $regis_size,
                    'donate_value' => $money_numberic,
                    'donate_alphabet' => $money_alphabet,
                    'cloth_recieve' => $regis_cloth,
                    'regis_joining' => $regis_joining,
                    'medal_recieve' => $regis_medal_recieve
                ]
            );
        }


        //If Bib is now successful generated or nothing change about bib Using This Query
        else {
            DB::table('bike_register')->where('id', $regis_id)->update(
                [
                    'input_user' => $input_username,
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
                    'regis_size' => $regis_size,
                    'donate_value' => $money_numberic,
                    'donate_alphabet' => $money_alphabet,
                    'cloth_recieve' => $regis_cloth,
                    'regis_joining' => $regis_joining,
                    'medal_recieve' => $regis_medal_recieve
                ]
            );
        }
        return Redirect::to('/home/view');
    }

    /* -------------------------------
     * Edit Controller - Delete Record
     * Delete using GET method with easy Javascript Confirmation
     * ----------------------------------- 
     */
    public function deleteRecord($id)
    {
        if (Auth::check()) {
            DB::table('bike_register')->where('id', $id)->delete();
            echo "<script>alert('Successfull Deleting การลบข้อมูลสำเร็จ');</script>";
            return Redirect::to('/home/view');
        } else {
            echo "<script>alert('ไม่สามารถที่จะลบได้ เนื่องจากคุณไม่มีสิทธิในการลบ กรุณาเข้าสู่ระบบ');</script>";
            return Redirect::to('/home/view');
        }
    }

    public function recieve($item, $id)
    {
        if ($item == "cloth") {
            DB::table('bike_register')->where('id', $id)->update(
                [
                    'cloth_recieve' => true
                ]
            );
        }
        if ($item == "medal") {
            DB::table('bike_register')->where('id', $id)->update(
                [
                    'medal_recieve' => true
                ]
            );
        }
        return Redirect::to('/home/view');
    }
}
