@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <title>update vehicle</title>      
<style>
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
<h2  class = "h2">Update Vehicle Details</h2>
    <form method = "post" action = "/updatevehicle">
    {{csrf_field()}}
            <div class="card-body text-left">

                <div class="row ">
                    <div class="col-md-6 ">
                        
                        <label for="name"><b>Number</b></label>
                        <input class="form-control" type="text" value="{{$data->number}}" name="number" >
                    </div>
                    <div class="col-md-6">
                        <label for="province"><b>Province</b></label>
                        <input class="form-control" type="text" value="{{$data->state}}" name="state" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="city"><b>City</b></label>
                        <input class="form-control" type="text" value="{{$data->city}}" name="city" >
                    </div>
                </div>

            </div>
        </div>
        <input type="hidden" name = "vid" value="{{$data->vid}}"/>

    <div align = "center">
    <input type="submit" class="btn btn-success" value="update"/>
    &nbsp &nbsp 
    <input type="button" class="btn btn-danger" value="cancel"/>
</siv>
</div>
@endsection
</body>
</html>