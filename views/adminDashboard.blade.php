@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PICK&GO</title>
    <style>

.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}
/* Create three equal columns that floats next to each other */

</style>
</head>
<body>

     
      <div class="card-body pl-5 pr-5">
      <div class = "card">
     
    <h2 class = "h2">Order Statics</h2>
<div class="row">
   <div class="col-md-20 col-lg-20">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-1 swiper-wrapper list-inline">
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div>
                        <div>  
                        </div>
                        <div class="progress-detail">
                       
                           <p  class="mb-2">New Orders</p>
                           <h4 class="counter">{{ $pending }}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div >
                          
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">All Orders</p>
                           <h4 class="counter">{{ $count }}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div >
                         
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Pickup orders</p>
                           <h4 class="counter">{{ $pickup }} </h4>
                        </div>
                     </div>
                  </div>
               </li>
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div>
                         
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Available To Deliver Orders</p>
                           <h4 class="counter">{{ $deliver }}</h4>
                        </div>
                     </div>
                  </div>
               </li>


               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="700">
                  <div class="card-body">
                     <div>
                        <div>  
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-1">Dropup orders</p>
                           <h4 class="counter">{{ $dropup }}</h4>
                        </div>
                     </div>
                  </div>
               </li>
               

            </ul>
         
               
      </div>
      </div>
      </div>
      </div>


           
              
      





                  
</div>
</div>
@endsection
</body>
</html>

