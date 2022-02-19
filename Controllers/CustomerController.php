<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Models\Customers;
use Auth;
use Hash;
use Session;



class CustomerController extends Controller
{
    public function store(Request $request){

   
       $customers =new Customers; 

        $name = $request->name;
        $email = $request->email;
        $province = $request->province;
        $city = $request->city;
        $address = $request->address;
        $phone = $request->phone;
        $pass = Hash::make($request->password);
      
        $cs = Session::get('cid');


      $d =   DB::insert("INSERT INTO `customers`(`name`,`email`,`province`, `city`,  `address` , `phone` , `password`, `customer`) 
      VALUES ('$name', '$email', '$province', '$city','$address','$phone', '$pass', '$cs')");


      $data=Customers::all();

      return Redirect::to('customers')->with('data',$d);
}
public function customer_view(Request $request){


    $id = $request->id;
  
    $d = DB::select("SELECT * FROM `customers`");
  
    return view("customers")->with('data',$d);
  }
  
  public function updatecustomersView($id){


    $d =Customers::find($id); 
    
    return view('updatecustomers')->with('data',$d);
  }
  
  public function updatecustomers(Request $request){

    $id=$request->id;
    $name = $request->name;
    $email = $request->email;
    $province = $request->province;
    $city = $request->city;
    $address = $request->address;
    $phone = $request->phone;

    $d =  DB::update("UPDATE `customers` SET `name` = '$name', `email` = '$email', `province` = '$province',
     `city` = '$city', `address` = '$address', `phone` = '$phone'
     WHERE `id` = '$id'");

    $data=Customers::all();
    
    return Redirect::to('customers')->with('data',$d);
  
  }
  public function deletecustomers($id){

    $data=Customers::find($id); 
  

  
    $data->delete();
    return redirect()->back();
  
  }



 

  public function login(Request $request)
  {
  
      {

        $email = $request->email;
        $pass = $request->password;


        $d = DB::select("SELECT * FROM `customers` WHERE `email` = '$email'");
        //dd(count($d));
        if(count($d)>0){

          $dp = $d[0]->password;
          if(Hash::check($pass, $dp)){


            Session::put('cid', $d[0]->id);
            Session::put('cname', $d[0]->name);

            return Redirect::to('/customer/');

          }else{
            return back()->withErrors([
              'email' => 'The provided credentials do not match our records.',
            ]);
          }

        }else{
          return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
          ]);
        }
       
    }

  }



  public function index(){

    $cs = Session::get('cid');
    $a = count(DB::select("SELECT * FROM `products` WHERE `customer` = '$cs'"));

    return view('userDashboard')->with('all',$a);
  }




  
}
