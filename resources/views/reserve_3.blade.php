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

<div class="container">
  <div class="row">
   <div class="col-md-6">
   <h3>วันออกเดินทาง : {{$datein}}</h3>
    @if($book_above!="true")
    <form class="form-horizontal" action="{{url('reserve_ticket')}}" method="POST" role="form">
   <input type="hidden" name="datein" value="{{$datein}}"></input>
   <input type="hidden" name="name" value="{{$name}}"></input>
   <input type="hidden" name="dateout" value="{{$dateout}}"></input>
   <input type="hidden" name="book_above" value="true"></input>
    <input type="hidden" name="book_below" value="{{$book_below}}"></input>
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
       
       <td style="white-space: normal; background-repeat:no-repeat; background-position:center ;  padding-bottom:5px;cursor:pointer;" valign="bottom">{{$c->source}}</td><input type="hidden" name="source" value="{{$c->source}}">
       <td>{{$c->endways}}</td><input type="hidden" name="endways" value="{{$c->endways}}">
       <td>{{$c->time_out}}</td>

      {!! csrf_field() !!}
      <input type="hidden" name="twoways" value="true">
      <input type="hidden" name="carrid_id" value="{{$c->carrid_id}}">
      <input type="hidden" name="pp" value="{{$pp}}">
      <input type="hidden" name="tel" value="{{$tel}}">
      <input type="hidden" name="nn" value="{{$nn}}">
      <input type="hidden" name="cost" value="{{$cost}}">
      <td><button type=submit id="search" name="time_out" class="btn btn-info" value="{{$c->time_out}}" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> จอง</button></td>
      
      </tr> 
      @endforeach
    </form>
    </tbody>
    </thead>
  </table>
    </fieldset>
    @else
       <div class="alert alert-danger"><strong>
  ท่านได้ทำการจองตั๋วขาไปแล้วค่ะ</strong></div>
    @endif
   </div>
   </div>
</div>
<br><br>
 @if($book_above=="true")
<div class="container">
  <div class="row">
   <div class="col-md-6">
   <h3>วันเดินทางกลับ : {{$dateout}}</h3>
     <form class="form-horizontal" action="{{url('reserve_ticket')}}" ng-app="app" ng-controller="form" method="POST" role="form">
   <label for="sel1">ต้นทาง :</label>
      
      <select class="form-control" name="source" required ng-model="form.psource">
        <option value="{{$endways}}">{{$endways}} </option>
      </select><br>
       <label for="sel1">จุดขึ้นรถ :</label>
      <select class="form-control" name="pp" id ="id">
        <option  ng-repeat="c in psources" ng-show="c.tpye ===
        form.psource">
                  [[c.name]]</option>
      </select>
      
      <br>
      <label for="sel1">ปลายทาง :</label>
      <select class="form-control" name="endways" required ng-model="form.pendway">
        <option value="{{$source}}">{{$source}}</option>
      </select><br>
      <label for="sel1">จุดลงรถ :</label>
      <select class="form-control" name="nn" id ="id">
        <option ng-repeat="c in pendways" ng-show="c.tpye ===
        form.pendway">
                  [[c.name]]</option>
      </select><br>
    <input type="hidden" name="datein" value="{{$datein}}"></input>
   <input type="hidden" name="dateout" value="{{$dateout}}"></input>
   <input type="hidden" name="name" value="{{$name}}"></input>
   <input type="hidden" name="book_above" value="{{$book_above}}"></input>
   <input type="hidden" name="book_below" value="true"></input>
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
      @foreach($carride_tbls2 as $c)
      <tr>   
       
       <td style="white-space: normal; background-repeat:no-repeat; background-position:center ;  padding-bottom:5px;cursor:pointer;" valign="bottom">{{$c->source}}</td><input type="hidden" name="source" value="{{$c->source}}">
       <td>{{$c->endways}}</td><input type="hidden" name="endways" value="{{$c->endways}}">
       <td>{{$c->time_out}}</td>

      {!! csrf_field() !!}
      <input type="hidden" name="twoways" value="true">
      <input type="hidden" name="carrid_id" value="{{$c->carrid_id}}">
      <input type="hidden" name="tel" value="{{$tel}}">
      <input type="hidden" name="cost" value="{{$cost}}">
      <td><button type=submit id="search" name="time_out" class="btn btn-info" value="{{$c->time_out}}" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> จอง</button></td>
      
      </tr> 
      @endforeach
      </form>
    @endif
    </tbody>
    </thead>
  </table>
    </fieldset>
   </div>
   </div>
</div>


<script type="text/javascript">
var app = angular.module('app', [], function ($interpolateProvider) {
            $interpolateProvider.startSymbol('[[');
            $interpolateProvider.endSymbol(']]');
        });
        app.config(['$sceProvider', function ($sceProvider) {
            $sceProvider.enabled(true);
        }]);
        app.controller('form', function ($scope) {
            $scope.form = {}
            $scope.psources = [
              {tpye:"",name:''},
              {tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสารภูเก็ตแห่งที่ 1'},{tpye:"พังงา",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารกระบี่'},{tpye:"สุราษฎร์ธานี",name:'สถานีขนส่งผู้โดยสารสุราษฯ ตลาดเกษตร 2'},
              {tpye:"นครศรีธรรมราช",name:'สถานีขนส่งผู้โดยสารหัวอิฐ'},{tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารหาดใหญ่'},
              {tpye:"เกาะลันตา",name:'ท่าเรือหัวหิน'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'สถานีขนส่งผู้โดยสารหัวอิฐ'},
            ]
            $scope.pendways = [
              {tpye:"",name:''},
              {tpye:"ภูเก็ต",name:'สนามบินภูเก็ต'},{tpye:"ภูเก็ต",name:'โลตัสถลาง'},
              {tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสารภูเก็ต แห่งที่ 2'},{tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสารภูเก็ต แห่งที่ 1'},{tpye:"พังงา",name:'สถานีขนส่งผู้โดยสารโคกกลอย'},{tpye:"พังงา",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารกระบี่'},{tpye:"กระบี่",name:'อ่าวลึก'},
              {tpye:"กระบี่",name:'ทับปุด'},{tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สนามบินภูเก็ต'},{tpye:"สุราษฎร์ธานี",name:'สถานีขนส่งผู้โดยสารพังงา'},{tpye:"สุราษฎร์ธานี",name:'เขื่อนรัชชประภา'},
              {tpye:"สุราษฎร์ธานี",name:'ตลาดช้าง'},{tpye:"สุราษฎร์ธานี",name:'ตลาดเกษตร 2'},
              {tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'ลำทับ'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'บางขัน'},
              {tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'ทุ่งสง'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'สวนผัก'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'ร่อนพิบูลย์'},
              {tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'ไม้หลา'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'หัวถนน'},
              {tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'ปลายพระยา'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'บางสวรรค์'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'พระแสง'},{tpye:"นครศรีธรรมราช (วิ่งทางด่านนอก)",name:'สถานีขนส่งผู้โดยสารหัวอิฐ'},
              {tpye:"นครศรีธรรมราช",name:'บ้านส้อง'},{tpye:"นครศรีธรรมราช",name:'ฉวาง'},
              {tpye:"นครศรีธรรมราช",name:'จันดี'},{tpye:"นครศรีธรรมราช",name:'ลานสกา'},
              {tpye:"นครศรีธรรมราช",name:'แยกเบญจมฯ'},{tpye:"นครศรีธรรมราช",name:'สถานีขนส่งผู้โดยสารหัวอิฐ'},{tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารพังงา'},{tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารกระบี่'},
              {tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารตรัง แห่งที่ 2'},{tpye:"หาดใหญ่",name:'สี่แยกเอเชีย'},{tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารหาดใหญ่'},{tpye:"หาดใหญ่",name:'ตลาดเกษตร'},
              {tpye:"เกาะลันตา",name:'สนามบินกระบี่'},{tpye:"เกาะลันตา",name:'เหนือคลอง'},
              {tpye:"เกาะลันตา",name:'ห้วยน้ำขาว'},{tpye:"เกาะลันตา",name:'คลองท่อม'},{tpye:"เกาะลันตา",name:'ท่าเรือหัวหิน'},
            ]
        });
        </script>