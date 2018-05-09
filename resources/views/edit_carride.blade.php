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
<form class="form-horizontal" action="{{url('update')}}" method="POST" role="form">
                    {!! csrf_field() !!}
<fieldset>
@include('navbar_admin')

<div class="container">
  <div class="row">
    <div class="col-md-4">
      <h2>บันทึกเที่ยวรถ</h2>
        <div class="form-group">
          <label for="inputdefault">ต้นทาง</label>
            <input class="form-control" name="source"id="inputdefault" type="text" value="{{$carride_tbls->source}}">
        </div>
        <div class="form-group">
          <label for="inputdefault">ปลายทาง</label>
            <input class="form-control" name="endways"id="inputdefault" type="text" value="{{$carride_tbls->endways}}">
        </div>
        <div class="form-group">
          <label for="sel1">เวลาที่รถออก</label>
            <input class="form-control" name="time_out" type="time" value="{{$carride_tbls->time_out}}"></input>
        </div> 
          <input type="hidden" name="carrid_id" value="{{$carride_tbls->carrid_id}}">
          <input type="submit" id="submit" name="submit" class="btn btn-success">
      </div>
    </div>
  </div><br><br>
</fieldset>
</div>
</form>
</body>
</html>
  