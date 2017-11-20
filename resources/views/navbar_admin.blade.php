<nav class="navbar navbar-default">
  <div class="container-fluid">
    <a class="navbar-brand" href="main_1">
                    <div class="form-inline">
                    <img src="{{url('img/bookingvan.png')}}" width="38" height="38" alt=""> <b>Booking Van</b>
                    </div>
  </a>
    <ul class="nav navbar-nav">
      <li class="active"><a href="main_admin"><span class="glyphicon glyphicon-home"></span> Home</a></li>
      <li><a href="regis_carride">ข้อมูลเที่ยวรถ</a></li>
      <li><a href="regis_driver">ข้อมูลคนขับรถ</a></li>
      <li><a href="regis_van">ข้อมูลรถ</a></li>
      <li><a href="regis_news">ข่าวสาร</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
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