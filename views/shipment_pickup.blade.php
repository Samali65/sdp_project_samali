@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

      <title>PickGo</title>
      
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
.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}
</style>
</head>
<body>
<div class="card-body pl-5 pr-5">
<div class = "container">
    <br>
<form  method="GET" name = "pid" action = "/shipping-pickup">

            <div class = "row" align = "right">
                <div class = "col-9" align = "right">
                    <input type="text" name="id" class = "form-control" placeholder = "Search by id"  value = "{{$id}}"/>  
                </div>
                <div class = "col-3">
                    <input type="submit" value="Search" class = "btn btn-primary"/>  
                </div>
            </div>


            <div class="card mt-4">
                <div class="card-body">


                    <div class="row">
                        <div class="col-md-6">
                            <label>Start Branch</label>
                            <input type = "text" class="form-control" value = "{{$sb}}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label>Destination Branch</label>
                            <input type = "text" class="form-control" value = "{{$eb}}" disabled>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label>Date</label>
                            <input type = "text" class="form-control" value = "{{$dt}}" disabled>
                        </div>

                        <div class="col-md-6">
                            <label>Vehicle</label>
                            <input type = "text" class="form-control" value = "{{$vh}}" disabled>
                        </div>
                    </div>

</div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h2 class = "h2">Product Data</h2>
                        </div>

                       
                    </div>



                    <div class="row mt-3">
                        <div class="col-md-12 overflow-auto">
                        <div class="table-responsive">
                            
                            <table class="table table-light">
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Vity</th>
                                <th>State</th>
                                <th>Zip Code</th>
                                <th>Product Mame</th>
                                <th>Brand And Model</th>
                                <th>Model ID</th>
    
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
                                    
                                </tr>
                                @endforeach
       
                          </table>



                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a href= "shipping-mark-as-reciverd/{{$id}}" class="btn btn-success">Mark as Reciverd</a>
                        </div>
                    </div>
                </div>
            </div>

            </form>


</div> 
@endsection

</body>
</html>
