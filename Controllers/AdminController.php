<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Admins;

use Auth;

class AdminController extends Controller
{
   
    public function store(Request $request){

        // dd($request->all());
       $admins=new Admins; 

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $address = $request->address;
        $phone = $request->phone;


      $d =   DB::insert("INSERT INTO `admins`(`name`,`email`,`password`,`address`,`phone`) VALUES ('$name', '$email', '$password', '$address','$phone')");
    
      $d = DB::select("SELECT * FROM `admins`");

      $data=Admins::all();

     return Redirect::to('admin')->with('data',$d);

      // return Redirect::to('userDashboard')->with('account',$data);

}
public function admin_view(Request $request){


  $id = $request->id;

  $d = DB::select("SELECT * FROM `admins`");

  return view("admin")->with('data',$d);
}

public function updateAdminView($id){


  $d =Admins::find($id); 
  
  return view('updateadmins')->with('data',$d);
}

public function updateAdmin(Request $request){

  $id=$request->id;
  $name = $request->name;
  $email = $request->email;
  $password = $request->password;
  $address = $request->address;
  $phone = $request->phone;

  $d =  DB::update("UPDATE `admins` SET `name` = '$name', `email` = '$email', `password` = '$password', `address` = '$address', `phone` = '$phone' WHERE `id` = '$id'");
  $data=Admins::all();
  
  return Redirect::to('admin')->with('data',$d);

}
public function deleteAdmin($id){

  $data=Admins::find($id); 

  // $data->delete();
    // return redirect()->back();

//   if ($data) {
//     return response()->json([
//         'status' => 1,
        
//         'msg' => 'success'
//     ]);
// } else {
//     return response()->json([
//         'status' => 0,
//         'msg' => 'fail'
//     ]);
//     // $data->delete();
// }

  $data->delete();
  return redirect()->back();

}


}
