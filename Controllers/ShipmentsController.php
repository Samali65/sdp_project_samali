<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Shipments;
use App\Models\Packages;
use App\Models\Products;
use Auth;


class ShipmentsController extends Controller
{



    public function create(Request $request)
    {
        $data=$request->vehicle;
        $branch=$request->branch;
        $vid = $request->vid;
        $bid = Auth::user()->branch;

        $pd = DB::select("SELECT * FROM `products` WHERE `status` = '3' AND `branch` = '$bid'");
        $db = DB::select("SELECT * FROM `centers`");
        $d = DB::select("SELECT * FROM `vehicles`");
        
        return view("shippings")->with('data',$d)->with('branch',$db)->with('product',$pd);

    
    }



    public function store(Request $request){


        $id = $request->id;
        $size = Auth::user()->branch;

        $date = $request->date;
        $branch = $request->branch;
        $vehicle = $request->vehicle;
        $pkg=$request->pkg;


        $t = new Shipments();
        $t->mid = $size;
        $t->date = $date;
        $t->branch = $branch;
        $t->vehicle = $vehicle;
        $t->save();
        $sid_ = $t->id;

        foreach($pkg as $pkgs){
          $pkg =   DB::insert("INSERT INTO `packages`(`sid`,`pid`) VALUES ('$sid_ ', '$pkgs')");
          DB::update("UPDATE `products` SET `status` = '4' WHERE `pid` = '$pkgs'");
         }


        return Redirect::to('shippings');
    }


    public function pickup(Request $request){

        $id = $request->id;

        $sb = '';
        $eb = '';
        $dt = '';
        $vh = '';

        $d = [];

        if($id != null){


            $a = DB::Select("SELECT * FROM `shipments` WHERE `id` = '$id'");

            if(count($a)>0){

            $sbb = $a[0]->mid;
            $ebb = $a[0]->branch;
            $vhb = $a[0]->vehicle;
            $dtb = $a[0]->date;


            $a_ = DB::select("SELECT * FROM `centers` WHERE `cid` = '$sbb'");
            $b_ = DB::select("SELECT * FROM `centers` WHERE `cid` = '$ebb'");
            $c_ = DB::select("SELECT * FROM `vehicles` WHERE `vid` = '$vhb'");


            $sb = $a_[0]->name;
            $eb = $b_[0]->name;
            $dt = $dtb;
            $vh = $c_[0]->number;

            $d = DB::select("SELECT `products`.* FROM `products`, `packages` WHERE `products`.`pid` = `packages`.`pid` AND `packages`.`sid` = '$id'");


            }


        }

        return view("shipment_pickup")->with('data', $d)->with('sb', $sb)->with('eb', $eb)->with('dt', $dt)->with('vh', $vh)->with('id', $id);
     
    }

    public function shipping_view(Request $request){


        $id = $request->id;
        $bid = Auth::user()->branch;
        
      
        $d = DB::select("SELECT `id`, `mid`,`date`,`name`,`number`
        FROM `shipments`,`centers`,`vehicles`
        WHERE `shipments`.`branch` = `cid` AND `shipments`.`vehicle` = `vid` AND `mid` = '$bid' ORDER BY `id`
        ");
        
 
      
        return view("shippingDetails")->with('data',$d);


    }   
    


    public function mark_as_reciverd(Request $request){

        $id = $request->id;

        $bid = Auth::user()->branch;
      
        $d = DB::select("SELECT * FROM `packages` WHERE `sid` = '$id'");

        DB::update("UPDATE `shipments` SET `status` = '2' WHERE `id` = '$id'");

        foreach($d as $dd){
            $pid = $dd->pid;

            DB::update("UPDATE `products` SET `branch` = '$bid' WHERE `pid` = '$pid'");
        }
      
        return redirect("shipping-pickup");
    }


}

