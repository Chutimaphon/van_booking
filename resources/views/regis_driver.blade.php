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
<form class="form-horizontal" action="{{url('driver')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกประวัติคนขับรถตู้</h2>
  <form>
    <div class="form-group">
      <label for="inputdefault">ชื่อ</label>
      <input class="form-control" name = "fname" id="inputdefault" type="text"required="">
    </div>
    <div class="form-group">
      <label for="inputdefault">นามสกุล</label>
      <input class="form-control" name = "lname" id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="sel1">ที่อยู่</label>
      <input class="form-control" name = "address" id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="sel1">เบอร์โทรศัพท์</label>
      <input class="form-control" name = "tel" id="inputdefault" type="text" required="">
    </div>
    
  </form>
  <button id="search" name="search" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Save</button>
</div>
</div></div><br><br>
<div class="container">
  <h2>เที่ยวรถ</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>ที่อยู่</th>
        <th>เบอร์โทรศัพท์</th>
      </tr>
      <tbody>
      @foreach($driver_tbl as $c)
      <tr>
       <td>{{$c->fname}}</td>
       <td>{{$c->lname}}</td>
       <td>{{$c->address}}</td>
       <td>{{$c->tel}}</td>
       <td><a href="{{url('/updatedriver')}}/{{$c->id_driver}}" id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
       <td><a href="{{url('/deletedriver')}}/{{$c->id_driver}}" id="search" name="search" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
      </tr> 
      @endforeach
    </tbody>
    </thead>
  </table><center>
  {{ $driver_tbl->links() }}
  </fieldset></center>
</div>
</form>
<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
    </script>
</body>
</html>
