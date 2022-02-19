@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>centers</title>
    <style>

/* Button used to open the contact form - fixed at the bottom of the page */

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #5cb85c;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}
</style>
</head>
<body>
<div>
<div class="card-body pl-5 pr-5">
<div class = "card">
           <h1  class = "h2"> Customer Details</h1>

           <a class="button"  href = "/addCustomer" style=";" onclick='window.location.href = "/addCustomer"'> <span>Add New Customer</span></a> <br>

           <div class="table-responsive">
                        <table class="table table-control" align ="center">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th></th>

                            @foreach($data as $d)  
                            <tr>
                               <td>{{$d->id}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->province}}</td>
                                <td>{{$d->city}}</td> 
                                <td>{{$d->address}}</td>
                                <td>{{$d->phone}}</td>


                                <td>
                                    <a href = "/updatecustomers/{{$d->id}}" class = "btn btn-success"> Update </a>
                                    <a href = "/deletecustomers/{{$d->id}}" class = "btn btn-danger"> Remove </a>

                                </td>
                         
                            </tr>
                            @endforeach
   
                         
   
                      </table>
                      @endsection
    </div> 
</div>
</body>
</html>