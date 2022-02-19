@extends('layouts.loginmaster')

@section('content')

<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">



</head>
<body>
<div class = "container">
<div align = "center">
    <br>
    <br>
    <br> <br>
				<form>
			<div class = "card">
            <div class="card-body text-left">
			<h1 align = "center"> Login For Admin</h1>
<hr> 
			
			<div class="col-md-15" align = "center">
                    <div class="col-md-6" align = "center">
					<input class="form-control" type="text" name="email" placeholder="Email" required="">
					</div>
					<br>
					<div class="col-md-6" >
					<input class="form-control" type="password" name="pswd" placeholder="Password" required="">
					</div>
				<br>
				<div align = "center">
				<a class = "btn btn-success" href= "/adminDashboard"  >Login</a>
				<br>
				<div class="col-sm-10">				<br>

                <p> Or register with </p>     
        
				<a href= "/signup">Sign up</button>
</div>

				</form>
			</div>

			<div class="login">

					<label aria-hidden="true"> <a href = "/adminDashboard"></label>

			</div>
	</div>
	@endsection
</body>
</html>