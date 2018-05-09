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
<form class="form-horizontal" action="{{url('paypal')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>

@include('navbar_admin')

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกรหัสPayPal</h2>
    <div class="form-group">
      <label for="inputdefault">ต้นทาง</label>
      <input class="form-control" name="source"id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="inputdefault">ปลายทาง</label>
      <input class="form-control" name="endways"id="inputdefault" type="text"required="">
    </div>
    <div class="form-group">
      <label for="sel1">รหัส PayPal</label>
      <input class="form-control" name="paypal"id="inputdefault" type="text" required=""></input>
    </div> 
  <button id="submitbutton" name="submitbotton" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span>  Save</button>

</div>
</div></div><br><br>
<div class="container">
<div class="row">
  <div class="col-md-12">
  <h2>รหัส PayPal</h2>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>รหัส PayPal</th>
      </tr>
      <tbody>
    @foreach($paypals as $c)
      <tr>   
       <td>{{$c-> source}}</td>
       <td>{{$c-> endways}}</td>
      <td>{{$c->  paypal}}</td>
    <td><a href="{{url('/updatepaypal')}}/{{$c->id}}" id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
      <td><a href="{{url('/delete')}}/{{$c->id}}" id="search" name="search" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td> 
      </tr> 
      @endforeach
    </tbody>
    </thead>
  </table><center>
    {{ $paypals->links() }}
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
