@extends('layouts.riderDash')

@section('content')


    <style>

.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}
/* Create three equal columns that floats next to each other */

</style>

    


   
<div class="card-body pl-5 pr-5">
      <div class = "card">
     
    <h2 class = "h2">Order Statics</h2>
<div class="row">
   <div class="col-md-20 col-lg-20">
      <div class="row row-cols-1">
         <div class="overflow-hidden d-slider1 ">
            <ul  class="p-0 m-0 mb-1 swiper-wrapper list-inline">
               
               
               <li class="swiper-slide card card-slide" data-aos="fade-up" data-aos-delay="800">
                  <div class="card-body">
                     <div class="progress-widget">
                        <div >
                         
                        </div>
                        <div class="progress-detail">
                           <p  class="mb-2">Available To Pickup orders</p>
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

