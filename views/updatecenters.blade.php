@extends('layouts.master')

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update centers</title>
</head>
<style>
.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}    
    </style>
<body>
<div class="card-body pl-5 pr-5">
<div class = "card">
<h2 class = "h2"> Update Branch Details</h2>
    <form method = "post" action = "/updatecenter">
    {{csrf_field()}}

            <div class="card-body text-left">
                

                <div class="row ">
                    <div class="col-md-6 ">
                        
                        <label for="name"><b>Name</b></label>
                        <input class="form-control" type="text" value="{{$centers->name}}" name="name" >
                    </div>
                    <div class="col-md-6">
                        <label for="province"><b>Province</b></label>
                        <input class="form-control" type="text" value="{{$centers->province}}" name="province" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="city"><b>City</b></label>
                        <input class="form-control" type="text" value="{{$centers->city}}" name="city" >
                    </div>
                    <div class="col-md-6">
                        <label for="address"><b>Address</b></label>
                        <input class="form-control" type="text" value="{{$centers->address}}" name="address" >
                    </div>
                </div>

            </div>
        </div>



        <input type="hidden" name = "cid" value="{{$centers->cid}}"/>

   
    <div align ="center">
    <input type="submit" style = "float:center" class="btn btn-success" value="Update"/>
    &nbsp &nbsp 
    <input type="button" class="btn btn-danger" value="Cancel"/>
</div>
    </div>
</div>
@endsection

</body>
</html>