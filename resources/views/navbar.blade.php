<nav class="navbar navbar-default">
  <div class="container-fluid">
    <a class="navbar-brand" href="main">
                    <div class="form-inline">
                    <font color="orange"><i class="fa fa-truck fa-1x"></i></font> <b>Booking Van</b>
                    </div>
  </a>
    <ul class="nav navbar-nav">
      <li class="active"><a href="main"><span class="glyphicon glyphicon-home"></span> Home</a></li>
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
      <li><a href="vanroute">เส้นทางการเดินรถ</a></li>
      <li><a href="reserve">จองตั๋ว</a></li>
      <li><a href="we">ความช่วยเหลือ</a></li>
      <li><a href="news">ข่าวสาร</a></li>
      <li><a href="stepreserve">วิธีการจอง</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>