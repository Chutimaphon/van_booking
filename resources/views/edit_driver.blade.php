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
@include('navbar_admin')
<form class="form-horizontal" action="{{url('updatedriver')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกประวัติคนขับรถตู้</h2>
  <form>
    <div class="form-group">
      <label for="inputdefault">ชื่อ</label>
      <input class="form-control" name = "fname" id="inputdefault" type="text" value="{{$driver_tbls->fname}}">
    </div>
    <div class="form-group">
      <label for="inputdefault">นามสกุล</label>
      <input class="form-control" name = "lname" id="inputdefault" type="text" value="{{$driver_tbls->lname}}">
    </div>
    <div class="form-group">
      <label for="sel1">ที่อยู่</label>
      <input class="form-control" name = "address" id="inputdefault" type="text" value="{{$driver_tbls->address}}">
    </div>
    <div class="form-group">
      <label for="sel1">เบอร์โทรศัพท์</label>
      <input class="form-control" name = "tel" id="inputdefault" type="text" value="{{$driver_tbls->tel}}">
    </div>
     <input type="hidden" name="id_driver" value="{{$driver_tbls->id_driver}}">
     <input type="submit" id="submit" name="submit" class="btn btn-success">
</div></div><br><br>
     
  </fieldset>
</div>
</form>
</body>
</html>
</body>
</html>