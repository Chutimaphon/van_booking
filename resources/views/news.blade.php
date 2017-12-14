<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/news.css">
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

<nav class="navbar navbar-default">
  <div class="container-fluid">

  <a class="navbar-brand" href="main_1">
                     <b>Booking Van</b>
  </a>
   
    <ul class="nav navbar-nav">
      <li class="active"><a href="main_1"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">จุดจำหน่ายตั๋ว <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="phuket">ภูเก็ต</a></li>
          <li><a href="pangnga">พังงา</a></li>
          <li><a href="krabi">กระบี่</a></li>
          <li><a href="surad">สุราษฎร์ธานี</a></li>
          <li><a href="nakhon">นครศรีธรรมราช</a></li>
          <li><a href="hatyai">หาดใหญ่</a></li>
          <li><a href="kohlanta">เกาะลันตา</a></li>
        </ul>
      </li>
      <li><a href="vanroute">เส้นทางการเดินรถ</a></li>
      <li><a href="news">ข่าวสาร</a></li>
      <li><a href="#">ติดต่อเรา</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    @if(!Auth::guest())
      @if (Auth::user()->email=="nanping3856@gmail.com")
        <li><a href="{{url('main_admin')}}" class="btn btn-info">Admin</a></li>
      @endif
    @endif
      <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user col-sm-2"></span>&nbsp;
                                    {{ Auth::user()->fname}} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <span class="glyphicon glyphicon-log-out"></span>  Logout
                                        </a>
                                        <li><a href="{{url('changepassword')}}" class="fa fa-key"> Change Password</a></li>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
    </ul>
  </div>
</nav>


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
