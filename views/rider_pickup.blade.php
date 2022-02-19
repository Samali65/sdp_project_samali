@extends('layouts.riderDash')

@section('content')


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>centers</title>
    <style>

.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #08053C;
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
<div class="card-body pl-5 pr-5">
<div class = "card">
<h2 class = "h2"> Available to Pickup</h2>
<div class="table-responsive">
<table class="table table-control">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip code</th>
                            <th>Product Details</th>
                            <th>Weight</th>
                            <th>Size</th>

                            <th></th>

                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->pid}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->address}}</td>
                                <td>{{$d->city}}</td>                              
                                <td>{{$d->state}}</td>
                                <td>{{$d->zip}}</td>
                                <td>{{$d->details}}</td>   
                                <td>{{$d->weight}}</td>
                                <td>{{$d->size}}</td>
                                <td>
                                    <!-- <a href = "/product_view/{{$d->pid}}" class = "btn btn-primary"> view details </a> -->
                                        <a class="button" style="vertical-align:middle" href = "/rider/product_view/{{$d->pid}}" > <span>View </span></a> <br>


                                </td>



                                <td>
                                    <!-- <a href = "/product_view/{{$d->pid}}" class = "btn btn-primary"> view details </a> -->
                                        <a class="button" style="vertical-align:middle" href = "/rider/pickup_mark/{{$d->pid}}" > <span>Pickup </span></a> <br>


                                </td>
                            </tr>
                            @endforeach
   
                      </table>
                    </div>

  
              
    </div>
  </div>

  @endsection
</body>
</html>
