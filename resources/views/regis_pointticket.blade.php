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
<form class="form-horizontal" action="{{url('pointticket')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
@include('navbar_admin')

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกจุดขึ้นรถ</h2>
    <div class="form-group">
      <label for="inputdefault">จุดจำหน่ายตั๋ว</label>
      <input class="form-control" name="topic"id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="inputdefault">ชื่อจุดจำหน่ายตั๋ว</label>
      <input class="form-control" name="name"id="inputdefault" type="text"required="">
    </div>
    <div class="form-group">
      <label for="sel1">ที่ตั้ง</label>
      <input class="form-control" name="address" id="inputdefault" type="text" required=""></input>
    </div>
    <div class="form-group">
     <label for="sel1">รายละเอียดเส้นทางเดินรถ</label>
      <textarea rows="10" cols="51" name="details"id="inputdefault"  type="text" required=""></textarea>
    </div>
    <div class="form-group">
     <label for="sel1">ตำแหน่งที่ตั้ง</label>
      <input class="form-control" name="map" id="inputdefault" type="text" required=""></input>
    </div>
  <button id="submitbutton" name="submitbotton" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>  Save</button>

</div>
</div></div><br><br>
<div class="container">
<div class="row">
  <div class="col-md-12">
  <h2>จุดขึ้นรถ</h2>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>จุดจำหน่ายตั๋ว</th>
        <th>ชื่อจุด</th>
        <th>ที่ตั้ง</th>
        <th>รายละเอียดเส้นทางเดินรถ</th>
        <th>ตำแหน่งที่ตั้ง</th>
      </tr>
      <tbody>
    @foreach($pointticket as $c)
      <tr>   
       <td>{{$c-> topic}}</td>
       <td>{{$c-> name}}</td>
      <td>{{$c->  address}}</td>
      <td>{{$c->  details}}</td>
      <td>{{$c->  map}}</td>
    <td><a href="{{url('/updatepointticket')}}/{{$c->id}}" id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
      <td><a href="{{url('/deletepointticket')}}/{{$c->id}}" id="search" name="search" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td> 
      </tr> 
      @endforeach
    </tbody>
    </thead>
  </table><center>
    {{ $pointticket->links() }}
</div></div></div></center>
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
