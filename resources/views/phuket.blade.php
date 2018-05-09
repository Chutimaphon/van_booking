<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')
<center> 
<h2>{{$pointticket->topic}}</h2><br>
<h3>{{$pointticket->name}}</h3>
<h4>{{$pointticket->address}}</h4>

<h3>{{$pointticket->route}}</h3>
<h4><i class="fa fa-phone" > &nbsp {{$pointticket->details}}</i></h4>

<br>
<div class="container">
<div class="embed-responsive embed-responsive-16by9">
<iframe class="embed-responsive-item" src="{{$pointticket->map}}" ></iframe>
</div>
</div>
</center>
<br><br>


</form>
</body>
</html>