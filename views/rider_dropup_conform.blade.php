@extends('layouts.riderDash')

@section('content')


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>centers</title>
    <style>

/* Button used to open the contact form - fixed at the bottom of the page */
.open-button {
  background-color: #;
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
.button {
  display: inline-block;
  border-radius: 4px;
  background-color: #08053C;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 16px;
  padding: 10px;
  width: 150px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}
.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}
</style>





</head>
<body>
<div align ="center">
<h2> Conform Dropup </h2>
<hr>
</div>
      <div class = "container text-center">

        <p>Reciver sign</p>
        <canvas id="canvas" style = "border: solid #08053C"></canvas>

          <form method = "post" action = "/rider/dropup-conform" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name = "link" id = "link">
            <input type="hidden" name = "id" value = "{{$id}}">

            <br>

            <p>Deliverd Proof Photo</p>

            <input type="file" name = "img" id = "">


            <br><br>
          <button class="btn btn-success">Save</button>

          </form>

          

      </div>

  
              
    </div>
  </div>



  <script>


window.addEventListener('load', ()=>{
		
    resize();
    document.addEventListener('mousedown', startPainting);
    document.addEventListener('mouseup', stopPainting);
    document.addEventListener('mousemove', sketch);
    window.addEventListener('resize', resize);
  });
    
  const canvas = document.querySelector('#canvas');
  
  
  const ctx = canvas.getContext('2d');
    
  function resize(){
  ctx.canvas.width = 700;
  ctx.canvas.height = 300;
  }
    
  let coord = {x:0 , y:0};
  let paint = false;
  function getPosition(event){
  coord.x = event.clientX - canvas.offsetLeft;
  coord.y = event.clientY - canvas.offsetTop;
  }

  function startPainting(event){
  paint = true;
  getPosition(event);
  }
  function stopPainting(){
  paint = false;
  save();
  }
    
  function sketch(event){
  if (!paint) return;
  ctx.beginPath();
  ctx.lineWidth = 5;
  ctx.lineCap = 'round';
  ctx.strokeStyle = 'green';
  ctx.moveTo(coord.x, coord.y);
  getPosition(event);
  ctx.lineTo(coord.x , coord.y);
  ctx.stroke();
  }


 

function save(){
  var image = canvas.toDataURL("image/png"); 
  document.getElementById("link").value = image;
}



  </script>



  @endsection
</body>
</html>
