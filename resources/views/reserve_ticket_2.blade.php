<!DOCTYPE html>
<html>
<head>
   <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/step.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
           <i class="fa fa-exclamation-triangle"></i>
           {{$errors}}
        </ul>
    </div>

@endif

<div class="container">
  <div class="row">
    <div class="col-md 6">
<div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">ค้นหาเที่ยวรถ</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">เลือกเวลาออกเดินทาง</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
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
      </div>
    </div>
  </div><br>

<center>
<div class="container">
  <div class="row">
  <div class="col-md-4">
  <br><br><br>
  <img src="img/van1.png">
  </div>
<div class="col-md-2"></div>
  <div class="col-md-6">
  <h2>เที่ยวรถ</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>เลขที่นั่ง</th>
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>เวลาที่รถออก</th>
      </tr>
      <tbody>
      @if(count($seat)>0)
  <div class="alert alert-danger"><strong>ที่นั่ง
      @foreach($seat as $a)
     {{$a->seat}}  
      @endforeach  มีคนจองแล้วค่ะ </strong>
  </div>
  @endif
    <form action="{{url('bookcar')}}" method="post">
      @for($i=1;$i<=$van->seat;$i++)
      <tr>
        <?php $check=false;?>
        @if(count($seat)>0)
          @foreach($seat as $a)
            @if($i==$a->seat)
              <?php $check=true; break;?>
            @endif
          @endforeach
        @endif
        @if($check)
          <th><span style="color:red;" class="glyphicon glyphicon-remove"></span></th>
        @else
        <th><input type="checkbox" name="checkbox[]" value="{{$i}}"></th>
        @endif
        <th>{{$i}}</th>
        <th>{{$carride->source}}</th>
        <th>{{$carride->endways}}</th>
        <th>{{$time_out}}</th>
        <input type="hidden" name="time_out" value="{{$time_out}}"></input>
      </tr>
      @endfor 
    </tbody>
    </thead>
  </table>
  <br><br></div>
 
     {{csrf_field()}}  
     <input type="hidden" name="datein" value="{{$datein}}"></input>
     <input type="hidden" name="carrid_id" value="{{$carride->carrid_id}}">
     <input type="hidden" name="id_van" value="{{$id_van}}">
     <input type="hidden" name="id" value="{{Auth::user()->id}}">
     <input type="hidden" name="pp" value="{{$pp}}">
     <input type="hidden" name="nn" value="{{$nn}}">

     <div class="row">
     <div class="col-md-8"></div>
     <div class="col-md-2">
     </div></div></div></div>
    </form></div>

    <h2>เที่ยวรถ</h2>    
  <table class="table table-striped">
    <thead>
      <tr>
        <th></th>
        <th>เลขที่นั่ง</th>
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>เวลาที่รถออก</th>
      </tr>
      <tbody>
      @if(count($seat)>0)
  <div class="alert alert-danger"><strong>ที่นั่ง
      @foreach($seat as $a)
     {{$a->seat}}  
      @endforeach  มีคนจองแล้วค่ะ </strong>
  </div>
  @endif
    <form action="{{url('bookcar')}}" method="post">
      @for($i=1;$i<=$van->seat;$i++)
      <tr>
        <?php $check=false;?>
        @if(count($seat)>0)
          @foreach($seat as $a)
            @if($i==$a->seat)
              <?php $check=true; break;?>
            @endif
          @endforeach
        @endif
        @if($check)
          <th><span style="color:red;" class="glyphicon glyphicon-remove"></span></th>
        @else
        <th><input type="checkbox" name="checkbox[]" value="{{$i}}"></th>
        @endif
        <th>{{$i}}</th>
        <th>{{$carride->source}}</th>
        <th>{{$carride->endways}}</th>
        <th>{{$time_out}}</th>
        <input type="hidden" name="time_out" value="{{$time_out}}"></input>
      </tr>
      @endfor 
    </tbody>
    </thead>
  </table>
  <br><br></div>
 
     {{csrf_field()}}  
     <input type="hidden" name="datein" value="{{$datein}}"></input>
     <input type="hidden" name="carrid_id" value="{{$carride->carrid_id}}">
     <input type="hidden" name="id_van" value="{{$id_van}}">
     <input type="hidden" name="id" value="{{Auth::user()->id}}">
     <input type="hidden" name="pp" value="{{$pp}}">
     <input type="hidden" name="nn" value="{{$nn}}">

     <div class="row">
     <div class="col-md-8"></div>
     <div class="col-md-2">
     <button type="submit" class="btn btn-success btn-lg btn-block btn-huge">จอง </button><br><br><br><br></div>
     </div></div></div>
    </form></div>
</head>
</html>