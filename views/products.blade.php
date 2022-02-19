@extends('layouts.userDash')
@section('content')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<style>

.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}
</style>
</head>
<body>
<div class="card-body pl-5 pr-5">
  <div class ="container">
<div class = "card">
    <form method="post" action ="/products" class="form-container">
    {{csrf_field()}}
 
    <div class="form-group">
  
    <h2 class = "h2">Billing Address</h2>
</div>
<div class="card-body text-left">
    <div class="form-group">
            <label for="fname"> Full Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="John M. Doe" required="">

</div>

<div class="form-group">
                <label for="email"> Email</label>
                <input type="text" class="form-control"  id="email" name="email" placeholder="john@example.com" required="">
    </div>
    <div class="form-group">
            <label for="adr"> Address</label>
            <input type="text" class="form-control" id="address" name="address" placeholder="No 60/70A street" required="">
</div>
    <div class="form-group">
            <label for="city"> City</label>
            <select name="city" class="form-control" id="city" class = "form-control" onchange = "calc_price()">
              @foreach($city as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>
            </div>   
    <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="North Western" required="">
              </div>
    <div class="form-group">

                <label for="zip"> Zip</label>
                <input type="text" class="form-control" id="zip" name="zip" placeholder="6080" required="">
              </div>
</div>   
<div class="form-group">
            <h2 class = "h2">Product Information</h2>
          
            </div>
<div class="card-body text-left">
            <div class="form-group">
            <label for="cname">Product Details</label>
            <input type="text" class="form-control" id="details" name="details" placeholder="mobile phone" required="">
            </div>

            <div class="form-group">
            <label for="weight">Product Weight (kg)</label>
            <input type="text" class="form-control" id="weight" name="weight" placeholder="10" required="" onkeyup = "calc_price()">
              </div>
            
            <div class="form-group">
            <label for="size">Product Size - W*L*H (cm)</label>
            <input type="text" class="form-control" id="size" name="size" placeholder="10*10*10" required="" onkeyup = "calc_price()">
                 
            </div>
</div>
            
            <div class="form-group">
              
            <h2 class = "h2">Sender Information</h2>
            </div>
            <div class="card-body text-left">
            <div class="form-group">
            <label for="cname">Sender Name</label>
            <input type="text" class="form-control" id="details" name="sname" placeholder="Danish elisebeth" required="">
            </div>
            
            <div class="form-group">

            <label for="email">Sender Email</label>
            <input type="text" class="form-control" id="semail" name="semail" placeholder="danish@example.com" required="">
            </div>
            
            <div class="form-group">

            <label for="phone">Sender Mobile Number</label>
            <input type="text" class="form-control" id="sphone" name="sphone" placeholder="0777777777" required="">
            </div>
            
            <div class="form-group">

            <label for="adr"> Sender Address</label>
            <input type="text" class="form-control" id="saddress" name="saddress" placeholder="No 60/70A street,colombo" required="">

            </div>
            
            <div class="form-group">

            <label for="city"> City</label>
            <select name="scity" class="form-control" id="scity" class = "form-control" onchange = "calc_price()">
              @foreach($city as $c)
                <option value="{{$c->id}}">{{$c->name}}</option>
              @endforeach
            </select>

            </div>
</div>
            <div class="form-group">

            <h2 class = "h2">Price   <span id = "price_d"></span></h2>
            <input type="hidden" class="form-control" id="price" name="price" >
                 
            </div>
            <div class="form-group mx-4">

              <input type="submit" class="btn btn-success" value = "save" >
            </div>

      </form>
    </div>
  </div> 
  </div>





<script>





 function calc_price() {


  scity


  var weight = document.getElementById("weight").value;
  var size = document.getElementById("size").value;
  var start = document.getElementById("scity").value;
  var end = document.getElementById("city").value;


      $.ajax({ 
        type: 'POST', 
        url: '/price', 
        data: { "_token": "{{ csrf_token() }}", 'weight':weight, 'size':size, 'start':start, 'end':end }, 
        dataType: 'json',
        success: function (data) { 
            console.log(data);
            document.getElementById("price").value = data;
            document.getElementById("price_d").innerHTML = data;
        }
      });


}



</script>







  @endsection
</body>
</html>


