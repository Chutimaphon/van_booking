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
  <link rel="stylesheet" type="text/css" href="../css/buttonbig.css">
  <link rel="stylesheet" type="text/css" href="../css/picture.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>
@include('navbar')


<div class="container">
 <div class="row">
  <div class="col-md-4">
    <form method="post" action="{{url('serach')}}">
        {{csrf_field()}}
    <h2>เที่ยวรถที่ต้องการเดินทาง</h2>
      <div class="form-group">
        <label for="sel1">ต้นทาง</label>
          <select class="form-control" name="source">
            @foreach($source as $s)
              <option value={{$s->source}} >{{$s->source}}</option>
            @endforeach
          </select><br>
        <label for="sel1">ปลายทาง</label>
          <select class="form-control" name="endways">
            @foreach($endways as $e)
              <option value={{$e->endways}} >{{$e->endways}}</option>
            @endforeach
          </select><br>
      </div>
  <button id="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
    </form>
  </div>
  <div class="col-md-5">
  <h2>เที่ยวรถ</h2>         
  <table class="table table-striped">
    <thead>
      <tr> 
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>เวลาที่รถออก</th>
      </tr>
    <tbody>
      @foreach($carride_tbls as $c)
        <tr>   
          <td>{{$c->source}}</td>
          <td>{{$c->endways}}</td>
          <td>{{$c->time_out}}</td>
        </tr> 
      @endforeach
    </tbody>
    </thead>
  </table>
</fieldset>
    {{ $carride_tbls->links() }}
    </div>
  </div>
</div>
 <hr>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
            <a href="reserve" class="btn btn-primary btn-lg btn-block btn-huge">จองตั๋ว</a>
        </div>
        <div class="col-md-3">
            <a href="stepreserve" class="btn btn-primary btn-lg btn-block btn-huge">วิธีการจอง</a>
        </div>
        <div class="col-md-3">
            <a href="#" class="btn btn-primary btn-lg btn-block btn-huge">ตรวจสอบประวัติการจอง</a>
        </div>
         <div class="col-md-3">
            <a href="checkstatus" class="btn btn-primary btn-lg btn-block btn-huge">เช็คสถานะการจอง</a>
        </div>
      </div>
    </div><br><br>
        <h3><center>เส้นทางยอดนิยม</center></h3><br><br>
    <div class="container">
      <div class="row">
        <div class="col-md-3">            
          <div class="thumbnail">
            <div class="caption">
              <h4>ภูเก็ต - เกาะลันตา</h4>
              <p>ราคาเริ่มต้นที่ 160 บาท</p>
                <a href="hitkohlanta" class="label label-default" rel="tooltip" title="Search Now">ค้นหา</a></p>
            </div>
                <img src="img/pic8.jpg" alt="..." width="100%" height="100%">
          </div>
        </div>
      
        <div class="col-md-3">            
          <div class="thumbnail">
            <div class="caption">
              <h4>ภูเก็ต - เขื่อนรัชชประภา</h4>
                <p>ราคาเริ่มต้นที่ 170 บาท</p>
                  <a href="hitsurad" class="label label-default" rel="tooltip" title="Search Now">ค้นหา</a></p>
            </div>
                  <img src="img/pic9.JPG" alt="..." width="100%" height="100%">
          </div>
        </div>

        <div class="col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                    <h4>ภูเก็ต - วัดพระธาตุ</h4>
                    <p>ราคาเริ่มต้นที่ 350 บาท</p>
                    <a href="hitnakhon" class="label label-default" rel="tooltip" title="Search Now">ค้นหา</a></p>
                </div>
                <img src="img/pic10.jpg" alt="..."width="100%" height="100%">
            </div>
      </div>

        <div class="col-md-3">            
            <div class="thumbnail">
                <div class="caption">
                    <h4>ภูเก็ต - ตลาดกิมหยง</h4>
                    <p>ราคาเริ่มต้นที่ 260 บาท</p>
                    <a href="hithatyai" class="label label-default" rel="tooltip" title="Search Now">ค้นหา</a></p>
                </div>
                <img src="img/pic11.jpg" alt="..."width="100%" height="100%">
            </div>
      </div>        
        
  <script src="{{asset('/js/picture.js')}}"></script>
</div><!-- /.container -->
</form>
</body>
</html>