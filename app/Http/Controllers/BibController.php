<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\EditController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class BibController extends Controller {
/** 
     * ---------------------------
     * Bib Generator from Database
     * Have one specify database for one donation type
     * running with Database Primary Key
     * -----------------------------
     * */

     public static function main(){
         //do nothing
     }

     
    public function generateBib($donate){
        if($donate == "1000000"){
            DB::table('bike_million')->insert([
                'status_use' => true
            ]);
            $bibId = DB::table('bike_million')->where('status_use',true)->orderBy('id','DESC')->select('id')->first();
            return $bibId->id;
        }
        if($donate == "5000"){
            DB::table('bike_thousand')->insert([
                'status_use' => true
            ]);
            $bibId = DB::table('bike_thousand')->where('status_use',true)->orderBy('id','DESC')->select('id')->first();
            return $bibId->id;
        }
        if($donate == "500"){
            DB::table('bike_hundred')->insert([
                'status_use' => true
            ]);
            $bibId = DB::table('bike_hundred')->where('status_use',true)->orderBy('id','DESC')->select('id')->first();
            return $bibId->id;
        }
    }
}