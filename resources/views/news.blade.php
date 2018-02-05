<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/news.css">
<title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="/css/boxtext.css">

 <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>
@include('navbar_1')


<div class="container">
  <div class="row">
    <h2>NEWS</h2>

    <section id="pinBoot">
@foreach($newgets as $s)
      <article class="white-panel">
      <img class="img img-responsive img-rounded" width=" 60%"  src="{{url("/uploads/{$s->picture}")}}"><br>
          <h4>{{$s->name}}</h4>
          <p>{{$s->details}}</p>
        
      </article>
@endforeach
    </section>

    <hr>

  </div>
  <p>
    <a href="http://validator.w3.org/check?uri=http%3A%2F%2Fbootsnipp.com%2Fiframe%2FZkk0O" target="_blank"><small>News</small><sup>5</sup></a>
    <br>
    <br>

  </p>
 <script src="{{asset('/js/news.js')}}"></script>
 <script src="{{asset('/js/picture.js')}}"></script>
</div>
</body></html>
