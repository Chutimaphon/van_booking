<!DOCTYPE html>
<html lang="en">
<head>

  <title>Bootstrap Example</title>
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
<form class="form-horizontal" action="{{url('updatevan')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกรถตู้ประจำทาง</h2>
  <form>
     <div class="form-group">
      <label for="inputdefault">เลขทะเบียนรถ</label>
      <input class="form-control" name = "id_van" id="inputdefault" type="text" value="{{$van_tbls->id_van}}">
    </div>
    <div class="form-group">
      <label for="inputdefault">ยี่ห้อรถ</label>
      <input class="form-control" name = "brand" id="inputdefault" type="text" value="{{$van_tbls->brand}}">
    </div>
    <div class="form-group">
      <label for="inputdefault">จำนวนที่นั่งภายในรถ</label>
      <input class="form-control" name = "seat" id="inputdefault" type="text" value="{{$van_tbls->seat}}">
    </div>
    <div class="form-group">
      <label for="sel1">ราคา</label>
      <input class="form-control" name = "cost"id="inputdefault" type="text" value="{{$van_tbls->cost}}">
    </div>
    <div class="form-group">
      <label for="sel1">ช่องที่จอดรถ</label>
      <input class="form-control" name = "parking_box"id="inputdefault" type="text" value="{{$van_tbls->parking_box}}">
    </div>
    <input type="hidden" name="id" value="{{$van_tbls->id}}">
    <input type="submit" id="submit" name="submit" class="btn btn-success">
</div>
</div></div><br><br>
  </fieldset>
</div>
</form>
</body>
</html>
</body>
</html>
