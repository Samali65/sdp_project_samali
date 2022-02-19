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
</style>
</head>
<body>
<div class="card-body pl-5 pr-5">
<div class = "container">
    <br>
<form  method="GET" name = "pid" action = "/search">
    
                @csrf
                <div class = "row" align = "right">
                <div class = "col-9" align = "right">
                    <input type="text" name="pid" class = "form-control" placeholder = "Search by id" />  
                 
                </div>
                <div class = "col-3">
                    <input type="submit" value="Search" class = "btn btn-primary"/>  
                    </div>
            </div>

            <div class="card mt-4">
                <div class="card-body">

<div class="table-responsive">
<table class="table table-control">
  
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Product name</th>
                            <th>Model ID</th>

                            <th></th>

                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->pid}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>
                                <td>{{$d->address}}</td>
                                <td>{{$d->details}}</td>
                                <td>{{$d->size}}</td>

                                <td>   
                                <a class="btn btn-success" href = "/mark-as-pick-up/{{$d->pid}}" >Pick up Branch</a>


                                </td>
                            </tr>
                            @endforeach
   
                      </table>
                    </div>

            </form>

</div>
</div> 
@endsection
</body>
</html>
