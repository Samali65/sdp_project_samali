@extends('layouts.userDash')
@section('content')


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');



.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #FF5722
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #ee5435;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #ee5435;
    border-color: #ee5435;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #ff2b00;
    border-color: #ff2b00;
    border-radius: 1px
}
</style>

</head>
<body>
<div class="container">
<div class="card-body pl-5 pr-5">

    <div class="card">
        <div class="card-body">
            <form method = "get" action ="">
            <div class="row">
                <div class="col-md-10">
                    <table>Tracking Code</table>
                    <input type="text" name = "id" class="form-control">
                </div>
                <div class="col-md-2">
                    <br>
                    <button  class="btn btn-primary">Track</button>
                </div>
            </div>
        </form>
        </div>
    </div>



    <article class="card">
        <header class="card-header">Tracking </header>
        <div class="card-body">
       
            <article class="card">
                <div class="card-body row">
                    
                    <div class="col"> <strong>Shipping BY:</strong> <br> curier service, | <i class="fa fa-phone"></i> +1598675986 </div>
                    <div class="col"> <strong>Tracking Code:</strong> <br> {{$id}} </div>
                   
                </div>
            </article>
            <div class="track">
                <div class="step <?php if($s1) {echo 'active';} ?>"> <span class="icon"> <i class="fa fa-check"></i> </span> <span class="text">Order confirmed</span> </div>
                <div class="step <?php if($s2) {echo 'active';} ?>"> <span class="icon"> <i class="fa fa-user"></i> </span> <span class="text"> Picked by courier</span> </div>
                <div class="step <?php if($s3) {echo 'active';} ?>"> <span class="icon"> <i class="fa fa-truck"></i> </span> <span class="text"> On the way </span> </div>
                <div class="step <?php if($s4) {echo 'active';} ?>"> <span class="icon"> <i class="fa fa-box"></i> </span> <span class="text">Delivered</span> </div>
            </div>
    
            
            <a href="/home" class="btn btn-warning" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to Dashboard</a>
        </div>
    </article>
</div>
@endsection

</body>
</html>
