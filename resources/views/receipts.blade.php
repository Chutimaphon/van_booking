<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/buttonbig.css">
  <link rel="stylesheet" type="text/css" href="/css/picture.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_admin')


<div class="container">
<div class="row">
<h2>รายรับประจำวัน :</h2><br>
<div class="col-md-3">
<form method="post" action="{{url('/show_income_each')}}" role="form" ng-app="app" ng-controller="form">
{!! csrf_field() !!}
<label for="date">วันที่ต้องการแสดง : </label> <input type="date" id="date_each" name="date_each" class="form-control" ><br>
<button id="submitbuttonup" name="submitbotton" class="btn btn-success" onclick="showtableupper()"> แสดง</button><br><br>
</form>
</div>
</div>
@if(isset($total_each))
 <table id="tableup" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>รายรับ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{$date}}
                            </td>
                            <td>
                                {{$total_each}}
                            </td>
                        </tr>
                    </tbody></table>@endif
</div>


<div class="container">
<div class="row">
<h2>รายรรับประจำเดือน :</h2><br>
<div class="col-md-3">
<form method="post" action="{{url('/show_income_month')}}" role="form" ng-app="app" ng-controller="form">
{!! csrf_field() !!}
<label for="date">เดือนที่ต้องการแสดง : </label> <input type="month" id="datepicker" name="date_month" class="form-control" ><br>
<button id="submitbutton" name="submitbotton" class="btn btn-success"> แสดง</button><br><br>
</form>
</form>
</div>
</div>
@if(isset($total_month))
 <table id="tableup" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>เดือนที่</th>
                            <th>รายรับ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                {{$date_month}}
                            </td>
                            <td>
                                {{$total_month}}
                            </td>
                        </tr>
                    </tbody></table>@endif
</div>
