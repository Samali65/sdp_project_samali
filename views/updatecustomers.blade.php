@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}


.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}


.btn1 {
  background-color: #08053C;
  border: none;
  color: #FFFFFF;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn1:hover {
  background-color: #08053C;
}

.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
} 
</style>
</head>
<body>
<div class="card-body pl-5 pr-5">
<div class = "card">
<h2 class = "h2">  Update Customer Details</h2>
    <form method = "post" action = "/updatecustomers">
    {{csrf_field()}}
            <div class="card-body text-left">
            

                <div class="row ">
                    <div class="col-md-6 ">
                        
                        <label for="name"><b>Customer Name</b></label>
                        <input class="form-control" type="text" value="{{$data->name}}" name="name" >
                    </div>
                    <div class="col-md-6">
                        <label for="province"><b>Email</b></label>
                        <input class="form-control" type="text" value="{{$data->email}}" name="email" >
                    </div>
                    <div class="col-md-6">
                        <label for="province"><b>Province</b></label>
                        <input class="form-control" type="text" value="{{$data->province}}" name="province" >
                    </div>
                    <div class="col-md-6 ">
                        
                        <label for="city"><b>City</b></label>
                        <input class="form-control" type="text" value="{{$data->city}}" name="city" >
                    </div>

                </div>
                <div class="row">
               
                    <div class="col-md-6">
                        
                        <label for="address"><b>Address</b></label>
                        <input class="form-control" type="text" value="{{$data->address}}" name="address" >
                    </div>
                    <div class="col-md-6">
                        <label for="phone"><b>Phone Number</b></label>
                        <input class="form-control" type="text" value="{{$data->phone}}" name="phone" >
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" name = "id" value="{{$data->id}}"/>

        <div align ="center">
    <input type="submit" class="btn btn-success" value="update"/>
    &nbsp &nbsp 
    <input type="button" class="btn btn-danger" value="cancel"/>
    </div>
</div>
@endsection

</body>
</html>