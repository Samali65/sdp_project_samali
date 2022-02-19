@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
      <title>centers</title>
      
<style>

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #555;
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

/* The popup form - hidden by default */
.form-popup {
  display: none;
  position: fixed;
  bottom: 0;
  right: 15px;
  border: 3px solid #f1f1f1;
  z-index: 9;
}

/* Add styles to the form container */
.form-container {
  max-width: 300px;
  padding: 10px;
  background-color: white;
}

/* Full-width input fields */
.form-container input[type=text], .form-container input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  border: none;
  background: #f1f1f1;
}

/* When the inputs get focus, do something */
.form-container input[type=text]:focus, .form-container input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for the submit/login button */
.form-container .btn {
  background-color: #04AA6D;
  color: white;
  padding: 16px 20px;
  border: none;
  cursor: pointer;
  width: 100%;
  margin-bottom:10px;
  opacity: 0.8;
}

/* Add a red background color to the cancel button */
.form-container .cancel {
  background-color: red;
}

/* Add some hover effects to buttons */
.form-container .btn:hover, .open-button:hover {
  opacity: 1;
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
<div class = "card" >
           <h2 class = "h2"> Centers Details </h2>

                <div class="table-responsive">

                        <table class="table table-control">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Province</th>
                            <th>City</th>
                            <th>Address</th>
                            <th></th>

                            @foreach($centers as $center)  
                            <tr>
                                <td>{{$center->cid}}</td>
                                <td>{{$center->name}}</td>
                                <td>{{$center->province}}</td>
                                <td>{{$center->city}}</td>
                                <td>{{$center->address}}</td>

                                <td>
                                    <a href = "/updatecenters/{{$center->cid}}" class = "btn btn-success"> Update </a>
                                    <a href = "/deletecenter/{{$center->cid}}" class = "btn btn-danger"> Remove </a>

                                </td>
                            </tr>
                            @endforeach
   
                      </table>
                      </div>
</div>
            <button class="open-button" onclick="openForm()">Add new Center</button>

            <div class="form-popup" id="myForm">
            <form method="post" action ="/centers" class="form-container">
            {{csrf_field()}}

                <h1>Add new Center</h1>

                <label for="name"><b>Name</b></label>
                <input type="text" placeholder="Enter branch name" name="name" required>

                <label for="province"><b>Province</b></label>
                <input type="text" placeholder="Enter Province" name="province" required>

                <label for="city"><b>City</b></label>
                <!-- <input type="text" placeholder="Enter City" name="city" required> -->
                <select name="city[]" id="city" class = "form-control" multiple> 
                  @foreach($city as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                  @endforeach
                </select>

                <label for="address"><b>Address</b></label>
                <input type="text" placeholder="Enter address" name="address" required>

                <input type="submit" class="btn btn-primary" value = "save" >
                <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
            </form>
            </div>
          
        </div>
    </div> 
    @endsection
</body>
</html>

<script>
function openForm() {
  document.getElementById("myForm").style.display = "block";
}

function closeForm() {
  document.getElementById("myForm").style.display = "none";
}
</script>