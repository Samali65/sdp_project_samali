@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update vehicle</title>
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
<h2 class = "h2"> Update Admin Details</h2>
    <form method = "post" action = "/updateadmins">
    {{csrf_field()}}
            <div class="card-body text-left">
               

                <div class="row ">
                    <div class="col-md-6 ">
                        
                        <label for="name"><b>Name</b></label>
                        <input class="form-control" type="text" value="{{$data->name}}" name="name" >
                    </div>
                    <div class="col-md-6">
                        <label for="email"><b>Email</b></label>
                        <input class="form-control" type="text" value="{{$data->email}}" name="email" >
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="city"><b>Password</b></label>
                        <input class="form-control" type="text" value="{{$data->password}}" name="password" >
                    </div>
                    <div class="col-md-6">
                        
                        <label for="Address"><b>Address</b></label>
                        <input class="form-control" type="text" value="{{$data->address}}" name="address" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="phone"><b>Phone</b></label>
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
@endsection
</body>
</html>