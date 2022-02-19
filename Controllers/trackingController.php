<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class trackingController extends Controller
{
    public function index(Request $req){

        $id = $req->id;

        $d = DB::select("SELECT * FROM `products` WHERE `tracking_code` = '$id'");

        $s1 = false;
        $s2 = false;
        $s3 = false;
        $s4 = false;

        if(count($d)>0){
            $s = $d[0]->status;


            if($s == 1){

                $s1 = true;
                $s2 = false;
                $s3 = false;
                $s4 = false;

            }else if($s == 2){

                $s1 = true;
                $s2 = true;
                $s3 = false;
                $s4 = false;

            }else if($s == 3 || $s == 4 || $s == 5){

                $s1 = true;
                $s2 = true;
                $s3 = true;
                $s4 = false;

            }else if($s == 6){

                $s1 = true;
                $s2 = true;
                $s3 = true;
                $s4 = true;

            }

        }else{
            $id = "Not Found";
        }

        return view('tracking')->with('id', $id)->with('s1', $s1)->with('s2', $s2)->with('s3', $s3)->with('s4', $s4);
    }
}
