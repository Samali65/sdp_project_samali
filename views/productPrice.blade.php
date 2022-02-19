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
                            <th>Weight</th>
                            <th>Width</th>
                            <th>Length</th>
                            <th>height</th>
                            <th>price</th>
                            <th></th>

                            @foreach($data as $d)  
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->weight}}</td>
                                <td>{{$d->width}}</td>
                                <td>{{$d->length}}</td>
                                <td>{{$d->height}}</td>
                                <td>{{$d->price}}</td>

                                <td>
                                    <a href = "/updateprice/{{$d->id}}" class = "btn btn-success"> Update </a>
                                    <a href = "/deleteprice/{{$d->id}}" class = "btn btn-danger"> Remove </a>

                                </td>
                            </tr>
                            @endforeach
   
                      </table>
                      </div>
</div>
            <button class="open-button" onclick="openForm()">Add New Product Price</button>

            <div class="form-popup" id="myForm">
            <form method="post" action ="/productPrice" class="form-container">
            {{csrf_field()}}

                <h1>Add New Product Price</h1>

                <label for="name"><b>Weight</b></label>
                <input type="text" placeholder="Enter Weight" name="weight" required>

                <label for="province"><b>Width</b></label>
                <input type="text" placeholder="Enter Width" name="width" required>
               
                <label for="name"><b>Length</b></label>
                <input type="text" placeholder="Enter Length" name="length" required>

                <label for="province"><b>Height</b></label>
                <input type="text" placeholder="Enter Height" name="height" required>

                <label for="province"><b>Price</b></label>
                <input type="text" placeholder="Enter Price" name="price" required>
            
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