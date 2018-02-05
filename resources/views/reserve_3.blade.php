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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script type="{{asset('/js/app.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="css/step.css">

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
    <div class="col-md 6">
      <h1>จองตั๋วรถ</h1>

          <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">ค้นหาเที่ยวรถ</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">เลือกเวลาออกเดินทาง</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">เลือกที่นั่ง</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">รอการชำระเงิน</div>
                </div>
            </div>     
        
  </div>
</div>
</div><br><br>
 <form class="form-horizontal" action="{{url('reserve_ticket')}}" method="POST" role="form">
<div class="container">
  <div class="row">
   <div class="col-md-6">
   <h3>วันออกเดินทาง : {{$datein}}</h3>
   <input type="hidden" name="datein" value="{{$datein}}"></input>
   </div>
    <div class="col-md-6">
    
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
       
       <td style="white-space: normal; background-repeat:no-repeat; background-position:center ;  padding-bottom:5px;cursor:pointer;" valign="bottom">{{$c->source}}</td>
       <td>{{$c->endways}}</td>
       <td>{{$c->time_out}}</td>

      {!! csrf_field() !!}
      <input type="hidden" name="carrid_id" value="{{$c->carrid_id}}">
      <input type="hidden" name="pp" value="{{$pp}}">
      <input type="hidden" name="nn" value="{{$nn}}">
      <input type="hidden" name="cost" value="{{$cost}}">
      <td><button type=submit id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> จอง</button></td>
      </form>
      </tr> 
      @endforeach
  
    </tbody>
    </thead>
  </table>
    </fieldset>
   </div>
   </div>
</div>
<br><br>
 <form class="form-horizontal" action="{{url('reserve_ticket')}}" method="POST" role="form">
<div class="container">
  <div class="row">
   <div class="col-md-6">
   <h3>วันเดินทางกลับ : {{$datein}}</h3>
   <input type="hidden" name="datein" value="{{$datein}}"></input>
   </div>
    <div class="col-md-6">
    
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
       
       <td style="white-space: normal; background-repeat:no-repeat; background-position:center ;  padding-bottom:5px;cursor:pointer;" valign="bottom">{{$c->source}}</td>
       <td>{{$c->endways}}</td>
       <td>{{$c->time_out}}</td>

      {!! csrf_field() !!}
      <input type="hidden" name="carrid_id" value="{{$c->carrid_id}}">
      <input type="hidden" name="pp" value="{{$pp}}">
      <input type="hidden" name="nn" value="{{$nn}}">
      <input type="hidden" name="cost" value="{{$cost}}">
      <td><button type=submit id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> จอง</button></td>
      </form>
      </tr> 
      @endforeach
  
    </tbody>
    </thead>
  </table>
    </fieldset>
   </div>
   </div>
</div>