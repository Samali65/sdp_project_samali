@extends('layouts.master')

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

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  opacity: 0.8;
  position: fixed;
  bottom: 23px;
  right: 28px;
  width: 280px;
}
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
<div class = "card overflow-auto">
<div class="card-body pl-5 pr-5 ">

<h2 class = "h2"> New Request Details</h2>
<div class="table-responsive">

<table class="table table-control">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>State</th>
                            <th>Product name</th>
                            <th>Brand and model</th>
                            <th>Model ID</th>
                            <th>Sender Name</th>
                            <th>Sender Email</th>
                            <th>Sender Contact Number</th>
                            <th>Rider Select</th>
                            <th>Action</th>
                 
                            @foreach($data as $d)
                            <tr>
                                <td>{{$d->pid}}</td>
                                <td>{{$d->name}}</td>
                                <td>{{$d->email}}</td>                            
                                <td>{{$d->state}}</td>
                                <td>{{$d->details}}</td>   
                                <td>{{$d->weight}}</td>
                                <td>{{$d->size}}</td>
                                <td>{{$d->sname}}</td>   
                                <td>{{$d->semail}}</td>
                                <td>{{$d->sphone}}</td>

                                <td>
                                    <select class = "form-control" id = "r_{{$d->pid}}">
                                      <option>Select rider</option>
                                      @foreach($riders as $r)
                                        <option value = "{{$r->id}}">{{$r->name}}</option>
                                      @endforeach
                                    </select>
                                </td>

                                <td>
                                    <button class = "btn btn-success" onclick = "update('{{$d->pid}}')">Update</button>
                                </td>
                                
                            </tr>
                            @endforeach

                           
   
                      </table>
                    </div>

  
              
    </div>
  </div>




  <script>

  function update(id){
      var r = document.getElementById("r_"+id).value;
      window.location.href = "/new_request_rider_update/"+id+"/"+r;
  }

  </script>




  @endsection
</body>
</html>
