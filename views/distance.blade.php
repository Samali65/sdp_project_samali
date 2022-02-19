@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PickGo</title>
      
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
    
<h2 class = "h2"> Submit Shipment Details</h2>

     <form method="post" action ="/distance" class="form-container">
     {{csrf_field()}}
            <div class="card-body text-left">

            <div class="row ">
                    <div class="col-md-6 ">

                        <label for="city1"><b>City 1</b></label>
                        <select name="city1" class="form-control">
                        <option> select </option>
                              @foreach($city1 as $d)
                                <option value = " {{ $d->id}} " > {{ $d->name }}  </option>
                              @endforeach
                        </select>
                        </div>

                        <div class="col-md-6 mb-3">
          
                         <label for="city2"><b>City 2</b></label>
                        <select name="city2" class="form-control">
                        <option> select </option>
                              @foreach($city2 as $d)
                                <option value = " {{ $d->id}} " > {{ $d->name }}  </option>
                              @endforeach
                        </select>
                        </div>
                        <div class="col-md-6 ">

                      <label for="distance"><b>Distance</b></label>
                        <input class="form-control" type="text" name="distance" >
                    </div>
                    <div >
                    <div class="col-md-6 mb-3">
                      
                      <input class = "btn btn-success mt-2" type="submit" value="Submit">

                    </div>

                    </div>
                    </select>
                      </div>
                      </div>
                      @endsection

</body>
</html>
