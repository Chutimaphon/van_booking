<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>
<form class="form-horizontal" action="{{url('updatepointticket')}}" method="POST" role="form">
                    {!! csrf_field() !!}
<fieldset>
@include('navbar_admin')

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>บันทึกจุดขึ้นรถ</h2>
    <div class="form-group">
      <label for="inputdefault">จุดจำหน่ายตั๋ว</label>
      <input class="form-control" name="topic"id="inputdefault" type="text" required=""  value="{{$pointticket->topic}}">
    </div>
    <div class="form-group">
      <label for="inputdefault">ชื่อจุดจำหน่ายตั๋ว</label>
      <input class="form-control" name="name"id="inputdefault" type="text"required="" value="{{$pointticket->name}}">
    </div>
    <div class="form-group">
      <label for="sel1">ที่ตั้ง</label>
      <input class="form-control" name="address" id="inputdefault" type="text" required="" value="{{$pointticket->address}}"></input>
    </div>
    <div class="form-group">
     <label for="sel1">รายละเอียดเส้นทางเดินรถ</label>
     <textarea rows="10" cols="51" name="details"id="inputdefault"  type="text" required="" value="{{$pointticket->details}}"></textarea>
    </div>
    <div class="form-group">
     <label for="sel1">ตำแหน่งที่ตั้ง</label>
      <input class="form-control" name="map" id="inputdefault" type="text" required="" value="{{$pointticket->map}}"></input>
    </div>
          <input type="hidden" name="id" value="{{$pointticket->id}}">
          <input type="submit" id="submit" name="submit" class="btn btn-success">
      </div>
    </div>
  </div><br><br>
</fieldset>
</div>
</form>
</body>
</html>
  
