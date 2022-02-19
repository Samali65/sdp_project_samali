@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">


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
    <h2 class = "h2"> Shipping Details</h2>
    <div class="table-responsive">
                        <table class="table table-control" >
                            <th>ID</th>
                            <th>Product Model ID</th>
                            <th>Date</th>
                            <th>Sending Branch</th>
                            <th>Sending Vehicle</th>
                       
                            @foreach($data as $d)  
                            <tr>
                               <td>{{$d->id}}</td>
                                <td>{{$d->mid}}</td>
                                <td>{{$d->date}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->number}}</td>
                             
                         
                            </tr>
                            @endforeach
   
                      </table>
                    </div>

    </div> 
    @endsection

</body>
</html>

</body>
</html>
