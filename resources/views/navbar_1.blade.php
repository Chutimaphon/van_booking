<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">CoETour</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="main_1">Home</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">จุดจำหน่ายตั๋ว <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">ภูเก็ต</a></li>
          <li><a href="#">พังงา</a></li>
          <li><a href="#">กระบี่</a></li>
          <li><a href="#">สุราษธานี</a></li>
          <li><a href="#">นครศรีธรรมราช</a></li>
        </ul>
      </li>
      <li><a href="reserve">จองตั๋ว</a></li>
      <li><a href="reserve">ยืนยันการชำระเงิน</a></li>
      <li><a href="#">เส้นทางการเดินรถ</a></li>
      <li><a href="#">วิธีการจองและชำระเงิน</a></li>
      <li><a href="#">ขั้นตอนการจอง</a></li>
      <li><a href="#">ข่าวสาร</a></li>
      <li><a href="#">ติดต่อเรา</a></li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
    @if (Auth::user()->email=="nanping3856@gmail.com")
      <li><a href="{{url('main_admin')}}">Admin</a></li>
    @endif
      <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>