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
<form class="form-horizontal" action="{{url('updatenews')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>

@include('navbar_admin')

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกข่าวประชาสัมพันธ์</h2>
    <div class="form-group">
      <label for="inputdefault">หัวข้อข่าว</label>
      <input class="form-control" name="name"id="inputdefault" type="text" required=""value="{{$news_tbls->name}}">
    </div>
    <div class="form-group">
      <label for="inputdefault">รายละเอียด</label>
      <textarea rows="10" cols="80" name="details"id="inputdefault" required=""value="{{$news_tbls->detials}}"></textarea>
    </div>
    <input type="hidden" name="id_news" value="{{$news_tbls->id_news}}">
     <input type="submit" id="submit" name="submit" class="btn btn-success">

</div>
</div></div><br><br>
