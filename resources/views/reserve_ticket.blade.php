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
<!-- <div class="container">
<div class="row">
  <div class="col-md-12">
  <h2>เที่ยวรถ</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th>เลขที่นั่ง</th>
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>วันที่ออกเดินทาง</th>
        <th>เวลาที่รถออก</th>
      </tr>
      <tbody>
      @for($i=1;$i<=$van->seat;$i++)
      <tr>
        <th>{{$i}}</th>
        <th>{{$carride->source}}</th>
        <th>{{$carride->endways}}</th>
        <th>วันที่ออกเดินทาง</th>
        <th>{{$carride->time_out}}</th>
        <th><button id="submitbutton" name="submitbotton" class="btn btn-info">จอง</button></th>
      </tr>
      @endfor
    </tbody>
    </thead>
  </table> -->
  <br><br></div>
  <div class="col-md-8">
  <center><h2>จองเที่ยวรถ</h2><br>
   

<a href="{{url('reserve_ticket')}}" class="btn btn-info">เที่ยวเดียว</a>
<a href="{{url('goback')}}" name="back" id="back" class="btn btn-info">ไป-กลับ</a>
  @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
           <i class="fa fa-exclamation-triangle"></i>
           {{$errors}}
        </ul>
    </div>

@endif
<br><br>
	<form method="post" action="{{url('reservations')}}">
    <div class="form-group">
          <label for="seat">เลขที่นั่ง : <input type="number" name="seat" id="seat" class="form-control" required min="1" max="13"></label>
          <label for="source">ต้นทาง : <input type="text" name="source" id="source" class="form-control" value="{{$carride->source}}">
          </label> 
          <label for="endways">ปลายทาง : <input type="text" name="endways" id="endways" class="form-control" value="{{$carride->endways}}">
          </label>
    </div>
    <div class="form-group">
         
          <label for="date">วันที่ออกเดินทาง : <input type="date" name="date" id="date" class="form-control" required=>
          </label>
          <label for="time_out">เวลาที่รถออก : <input type="time" name="time_out" id="time_out" class="form-control" value="{{$carride->time_out}}">
          </label>
    
     {{csrf_field()}}  
     <input type="hidden" name="carrid_id" value="{{$carride->carrid_id}}">
     <input type="hidden" name="id_van" value="{{$carride->id_van}}">
     <input type="hidden" name="id" value="{{Auth::user()->id}}">
         <button type="submit" class="btn btn-success">จอง </button>
    </form></div>
</div>
</div>
</div>
  <script src="{{asset('js/minus-input-plush.js')}}"></script>
</head>
</html>