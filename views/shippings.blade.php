@extends('layouts.master')

@section('content')

<!doctype html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>PickGo</title>
      
<style>
.h2{
  color: white;
  background-color: #FFBF00;
  padding: 14px 16px;
}    
    </style>
<body>
<div class="card-body pl-5 pr-5">
<div class = "card">
<h2 class = "h2"> Submit Shipment Details</h2>

     <form method="post" action ="/shippings" class="form-container">
     {{csrf_field()}}
            <div class="card-body text-left">

                <div class="row ">
                    <div class="col-md-6 ">

                      <label for="date"><b>Date</b></label>
                      <input class="form-control" type="date" id="date" name="date">  
                      </div>
                      <div class="col-md-6">
                        <label for="email"><b>Branch</b></label>
                        <select name="branch" class="form-control">
                        <option> select </option>
                              @foreach($branch as $db)
                                <option value = " {{ $db->cid}} " > {{ $db->name }}  </option>
                              
                              @endforeach
                        </select>
                      </div> 
                      <div>

                      <div class="row">
                    <div class="col-md-6">

                        <label for="city"><b>Vehicle</b></label>
                        <select  name="vehicle" class="form-control">
                        <option> select </option>
                    
                    @foreach($data as $d)
                      <option value = " {{ $d->vid}} " > {{ $d->number }}  </option>  
                    @endforeach

                    </div>
                    </select>
                      </div>
                      </div>

      <br>
      <div class="table-responsive">
    <table class="table table-control" >
                            <th>Customer Name</th>
                            <th>Package Address</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Zip</th>
                            <th>Checked</th>

                            @foreach($product as $pd)  
                            <tr>
                                
                                <td>{{$pd->name}}</td>
                                <td>{{$pd->address}}</td>
                                <td>{{$pd->city}}</td>
                                <td>{{$pd->state}}</td>
                                <td>{{$pd->zip}}</td>
                                
                                <td>
                                  <input type = "checkbox" value = "{{$pd->pid}}" name = "pkg[]">

                                </td>
                            </tr>
                            @endforeach
                        
                      </table>
                      <div >
                      
                            <input class = "btn btn-success" type="submit" value="Submit">

                          </div>
                      </form>


</div>
@endsection

</body>
</html>
