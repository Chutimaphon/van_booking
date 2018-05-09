<!DOCTYPE html>
<html lang="en">
<head>
  
</head>
<body>
    <nav class="navbar navbar-default">
  <div class="container-fluid">

  <a class="navbar-brand" href="{{url('/')}}/main_1">
                    <div class="form-inline">
                    <font color="orange"><i class="fa fa-truck fa-1x"></i></font> <b>Booking Van</b>
                    </div>
  </a>
   
   
    <ul class="nav navbar-nav">
      <li class="active"><a href="{{url('/')}}/main_1"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">จุดจำหน่ายตั๋ว <span class="caret"></span></a>
        <ul class="dropdown-menu">
        <?php
         $pointtickets = DB::table('pointtickets')->get();
        ?>
        @foreach($pointtickets as $point)
          
          <li><a href="{{url('/')}}/pointticket/{{$point->id}}"><?php echo substr($point->topic ,42) ?></a></li>
        @endforeach
        </ul>
      </li>
      <li><a href="{{url('/')}}/vanroute">เส้นทางการเดินรถ</a></li>
      <li><a href="{{url('/')}}/news">ข่าวสาร</a></li>
      <li><a href="{{url('/')}}/we">ความช่วยเหลือ</a></li>
      <li><a href="{{url('/')}}/ticket">ตั๋ว</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    @if(!Auth::guest())
      @if (Auth::user()->email=="nanping3856@gmail.com")
        <li><a href="{{url('/main_admin')}}" class="btn btn-info">Admin</a></li>
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

      @else
      <li><a href="register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    @endif
    </ul>
  </div>
</nav>
</body>
</html>
