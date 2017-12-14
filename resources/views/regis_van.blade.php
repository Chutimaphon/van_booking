<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>
@include('navbar_admin')
<form class="form-horizontal" action="{{url('van')}}" method="POST" role="form">
                   
                    <fieldset>

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกรถตู้ประจำทาง</h2>
  <form>
  {{csrf_field()}}
     <div class="form-group">
      <label for="inputdefault">เลขทะเบียนรถ</label>
      <input class="form-control" name = "id_van" id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="inputdefault">ยี่ห้อรถ</label>
      <input class="form-control" name = "brand" id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="inputdefault">จำนวนที่นั่งภายในรถ</label>
      <input class="form-control" name = "seat" id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="sel1">ช่องที่จอดรถ</label>
      <input class="form-control" name = "parking_box"id="inputdefault" type="text" required="">
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
        <th>เลขทะเบียนรถ</th> 
        <th>ยี่ห้อรถ</th>
        <th>จำนวนที่นั่งภายในรถ</th>
        <th>ช่องที่จอดรถ</th>
      </tr>
      <tbody>
      @foreach($van_tbls as $c)
      <tr>
       <td>{{$c->id_van}}</td> 
       <td>{{$c->brand}}</td>
       <td>{{$c->seat}}</td>
       <td>{{$c->parking_box}}</td>
       <td><a href="{{url('/updatevan')}}/{{$c->id}}" id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
      <td><a href="{{url('/deletevan')}}/{{$c->id}}" id="search" name="search" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
      @endforeach
    </tbody>
    </thead>
  </table><center>
  {{ $van_tbls->links() }}
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
