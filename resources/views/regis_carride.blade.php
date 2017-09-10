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
<form class="form-horizontal" action="{{url('carride')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>

@include('navbar_admin')

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกเที่ยวรถ</h2>
    <div class="form-group">
      <label for="inputdefault">ต้นทาง</label>
      <input class="form-control" name="source"id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="inputdefault">ปลายทาง</label>
      <input class="form-control" name="endways"id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="sel1">เวลาที่รถออก</label>
      <input class="form-control" name="time_out" type="time"></input>
    </div> 
  <button id="submitbutton" name="submitbotton" class="btn btn-success">Save</button>
  <button id="search" name="search" class="btn btn-info">Edit</button>

</div>
</div></div><br><br>
<div class="container">
  <h2>เที่ยวรถ</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>เลขที่เที่ยวรถ</th>
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>เวลาที่รถออก</th>
      </tr>
      <tbody>
    @foreach($carride_tbls as $c)
      <tr>
       <td>{{$c->carrid_id}}</td>
       <td>{{$c-> source}}</td>
       <td>{{$c-> endways}}</td>
      <td>{{$c->  time_out}}</td>
      </tr> 
      @endforeach
    </tbody>
    </thead>
  </table>
    </fieldset>
</div>
</form>
</body>
</html>
</body>
</html>