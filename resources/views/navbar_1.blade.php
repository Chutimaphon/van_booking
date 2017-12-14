<nav class="navbar navbar-default">
  <div class="container-fluid">

  <a class="navbar-brand" href="main_1">
                    <div class="form-inline">
                    <img src="{{url('/img/bookingvan.png')}}" width="38" height="38" alt=""> <b>Booking Van</b>
                    </div>
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
      <li><a href="we">ความช่วยเหลือ</a></li>
      
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