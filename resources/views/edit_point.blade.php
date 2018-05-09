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
<form class="form-horizontal" action="{{url('updatepoint')}}" method="POST" role="form">
                    {!! csrf_field() !!}
<fieldset>
@include('navbar_admin')

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>บันทึกจุดขึ้นรถ</h2>
    <div class="form-group">
      <label for="inputdefault">จุดขึ้นรถต้นทาง</label>
      <input class="form-control" name="psource"id="inputdefault" type="text" required="" value="{{$points->psource}}">
    </div>
    <div class="form-group">
      <label for="inputdefault">จุดลงรถปลายทาง</label>
      <input class="form-control" name="pendway"id="inputdefault" type="text"required="" value="{{$points->pendway}}">
    </div>
    <div class="form-group">
      <label for="sel1">ราคา</label>
      <input class="form-control" name="cost" id="inputdefault" type="text" required="" value="{{$points->cost}}"></input>
    </div>
          <input type="hidden" name="id_point" value="{{$points->id_point}}">
          <input type="submit" id="submit" name="submit" class="btn btn-success">
      </div>
    </div>
  </div><br><br>
</fieldset>
</div>
</form>
</body>
</html>
  
