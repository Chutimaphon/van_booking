<!DOCTYPE html>
<html>
<head>
   <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/minus-input-plush.css">
  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')
<div class="container">
<div class="row">
  <div class="col-md-4">
<img src="img/van1.png">

  <br><br></div>
  <div class="col-md-8">
  <center><h2>จองเที่ยวรถ</h2><br>
<br>   
<a href="{{url('goback')}}" name="back" id="back" class="btn btn-info">ไป-กลับ</a>

<br><br>
<center>
  <form method="post" action="{{url('reservations')}}">
    <div class="form-group">
          <label for="seat">เลขที่นั่ง : <input type="number" name="seat" id="seat" class="form-control" required></label>
          <label for="source">ต้นทาง : <input type="text" name="source" id="source" class="form-control" value="">
          </label> 
          <label for="endways">ปลายทาง : <input type="text" name="endways" id="endways" class="form-control" value="">
          </label>
    </div>
    <div class="form-group">
         
          <label for="date">วันที่ออกเดินทาง : <input type="date" name="date" id="date" class="form-control" required=>
          </label>
          <label for="time_out">เวลาที่รถออก : <input type="time" name="time_out" id="time_out" class="form-control" value="">
          </label>
    
     {{csrf_field()}}  
     <input type="hidden" name="carrid_id" value="">
     <input type="hidden" name="id_van" value="">
     <input type="hidden" name="id" value="">
     <div class="form-group">
          <label for="seat">เลขที่นั่ง : <input type="number" name="seat" id="seat" class="form-control" required></label>
          <label for="source">ต้นทาง : <input type="text" name="source" id="source" class="form-control" value="">
          </label> 
          <label for="endways">ปลายทาง : <input type="text" name="endways" id="endways" class="form-control" value="">
          </label>
    </div>
    <div class="form-group">
         
          <label for="date">วันที่ออกเดินทาง : <input type="date" name="date" id="date" class="form-control" required=>
          </label>
          <label for="time_out">เวลาที่รถออก : <input type="time" name="time_out" id="time_out" class="form-control" value="">
          </label>
    
     {{csrf_field()}}  
     <input type="hidden" name="carrid_id" value="">
     <input type="hidden" name="id_van" value="">
     <input type="hidden" name="id" value="">
         <button type="submit" class="btn btn-success">จอง </button>
    </form></div>
</div>
</div>
</div>
<script src="{{asset('js/minus-input-plush.js')}}"></script>
</head>
</html>