@extends('layouts.master')

@section('content')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}


.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

.btn1:hover {
  background-color: #08053C;
}

}
</style>
</head>
<body>

<div align = "center">
<h2>Customer Registration Form</h2>
<p>Add Customer Details By Filling In The Customer Registration Form Below</p>
<hr>
</div>
<div class="row">
  <div class="col-75">
    <div class="container">

    <form method="post" action ="/addCustomer" class="form-container">
    {{csrf_field()}}

        <div class="row">
          <div class="col-50">
            <h3>Customer Details</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="name" name="name" placeholder="John M. Doe" required="">
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Province</label>
            <input type="text" id="province" name="province" placeholder="Western Province" required="">
            <label for="adr"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="colombo" required="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="address" name="address" placeholder="No 60/70A street" required="">
            <label for="adr"><i class="fa fa-address-card-o"></i> Phone Number</label>
            <input type="text" id="phone" name="phone" placeholder="0777 777 777" required="">
          

          </div>

    
        <input type="submit" class="btn btn-success" value = "save" >
      </form>
    </div>
  </div> 
  </div>
  @endsection
</body>
</html>