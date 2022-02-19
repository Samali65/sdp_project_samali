@extends('layouts.riderDash')

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
.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}
.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}
.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
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
label {
  margin-bottom: 10px;
  display: block;
}
.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}
.btn1 {
  background-color: #5cb85c;
  border: none;
  color: #FFFFFF;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}
a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}
/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
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

    @foreach($data as $d)

    <form class="form-container">
    {{csrf_field()}}

            <h2 class = "h2">Billing Address</h2><br>
            <div class="col-50">
            <label for="fname"> Full Name</label>
            <input type="text" name="name"  disabled="disabled" value="{{$d->name}}" >
            <label for="email">Email</label>
            <input type="text" name="email"  disabled="disabled" value="{{$d->email}}">
            <label for="adr"> Address</label>
            <input type="text"  name="address"  disabled="disabled" value="{{$d->address}}">
            <label for="city"> City</label>
            <input type="text" name="city"  disabled="disabled" value="{{$d->city}}">

                <label for="state">State</label>
                <input type="text"  name="state"  disabled="disabled" value="{{$d->state}}">
              </div>
              <div class="col-50">
                <label for="zip"> Zip</label>
                <input type="text"  name="zip"  disabled="disabled" value="{{$d->zip}}">
              </div>
         
     
            <h2 class = "h2">Product information</h2><br>
            <div class="col-50">
            <label for="cname">Product Details</label>
            <input type="text"  name="details"  disabled="disabled" value="{{$d->details}}">
            <label for="weight">Weight</label>
            <input type="text" name="weight"  disabled="disabled" value="{{$d->weight}}">
            <label for="size">Size</label>
            <input type="text" name="size"   disabled="disabled" value="{{$d->size}}">
                 
</div>
   
            <h2 class = "h2">Sender Information</h2><br>
            <div class="col-50">
            <label for="cname">Sender Name</label>
            <input type="text"  name="sname"  disabled="disabled" value="{{$d->sname}}">
             <label for="email">Sender Email</label>
             <input type="text"  name="semail"  disabled="disabled" value="{{$d->semail}}">
            <label for="phone">Sender Mobile Number</label>
            <input type="text"  name="sphone"  disabled="disabled" value="{{$d->sphone}}">
            <label for="adr"></i> Sender Address</label>
            <input type="text"  name="saddress"  disabled="disabled" value="{{$d->saddress}}">
                 
            </div>

      </form>
      @endforeach

    </div>
  </div> 
  </div>
  @endsection
</body>
</html>