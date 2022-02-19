@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update Rider Details</title>
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
<h2 class = "h2">  Update Price Details</h2>
    <form method = "post" action = "/updateprice">
    {{csrf_field()}}
            <div class="card-body text-left">
                <div class="row ">
                    <div class="col-md-6 ">
                        
                        <label for="weight"><b>Weight</b></label>
                        <input class="form-control" type="number" value="{{$data->weight}}" name="weight" >
                    </div>
                    <div class="col-md-6">
                        <label for="width"><b>Width</b></label>
                        <input class="form-control" type="number" value="{{$data->width}}" name="width" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        
                        <label for="length"><b>Length</b></label>
                        <input class="form-control" type="number" value="{{$data->length}}" name="length" >
                    </div>
                    <div class="col-md-6">
            
                        <label for="height"><b>Height</b></label>
                        <input class="form-control" type="number" value="{{$data->height}}" name="height" >
                    </div>
                    <div class="col-md-6">
                        <label for="price"><b>Price</b></label>
                        <input class="form-control" type="number" value="{{$data->price}}" name="price" >
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