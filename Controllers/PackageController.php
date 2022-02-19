<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Packages;
use Auth;


class PackageController extends Controller
{
    public function create(Request $request){

        // dd($request->all());
          

     // return view('shippings')->with('data',$d);
    //  return Redirect::to('shippings')->with('data',$d);

     $packages = $request->input('packages');
        foreach($packages as $package){
              $d =   DB::insert("INSERT INTO `packages`(`sid`,`pid`) VALUES ('$sid', '$pid')");

            
         }

        return redirect()->route('shippings');
        

         

    //    $packages =new Packages; 

    //    $name = $request->name;
    //    $address = $request->address;
    //    $city = $request->city;
    //    $state = $request->state;
    //    $zip = $request->zip;

        // $packages = $request->input('packages');
        // foreach($packages as $package){
        //     Post::create($packages);
        //  }



    //   $d =   DB::insert("INSERT INTO `packages`(`name`,`address`, `city`, `state`, `zip`) VALUES ('$name', '$address', '$city', '$state', '$zip')");


    //   $data=Packages::all();

    //   return view("shippings")->with('packages',$data);
    }

    
}
