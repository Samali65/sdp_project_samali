<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Users;

class UserController extends Controller
{
    public function store(Request $request){

        // dd($request->all());
       $users=new Users; 

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $province = $request->province;
        $city = $request->city;
        $address = $request->address;
        $phone = $request->phone;


      $d =   DB::insert("INSERT INTO `users`(`name`,`email`,`password`, `province`, `city`, `address`,`phone`) VALUES ('$name', '$email', '$password', '$province', '$city', '$address','$phone')");


      $data=Users::all();

      return view("home")->with('account',$data);

      // return Redirect::to('userDashboard')->with('account',$data);

}
public function accountView($id){


  $data =Users::find($id); 
  
  return view('home')->with('account',$data);
}
}