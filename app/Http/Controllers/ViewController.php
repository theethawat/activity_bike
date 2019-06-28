<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller {
    /**
     * -------------------------
     * View Controller 
     * Handling Display view to user to view and manage list of input and print recipt
     * --------------------------
     */
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

    public function printRecipt($id){
        $regisData = DB::table('bike_register')->where('id',$id)->first();
        return view('recipt')->with('data',$regisData);
    }

    public function printDetail($id){
        $regisData = DB::table('bike_register')->where('id',$id)->first();
        return view('data')->with('data',$regisData);
    }

    public function searchPage(){
        return view('search');
    }

    public function searchMethod(Request $request){
        $search_method = $request->input('search_method');
        $search_item = $request->input('search_item');

        if($search_method == "name")
        {
            $result = DB::table('bike_register')->where('regis_name',$search_item)->orderBy('id','DESC')->get();
        }
        else if ($search_method == "idcard"){
            $result = DB::table('bike_register')->where('regis_peopleid',$search_item)->orderBy('id','DESC')->get();
        }
		else if ($search_method == "ref_id"){
            $result = DB::table('bike_register')->where('bib_id',$search_item)->orderBy('id','DESC')->get();
        }

        $describe ="Search Result";
        return view('view')->with('data',$result)
        ->with('describe',$describe);
    }
}