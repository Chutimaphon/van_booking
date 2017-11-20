<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script type="{{asset('/js/app.js')}}"></script>
<!-- 
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
            $scope.psource = [
              {tpye:"",name:''},
              {tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสาร แห่งที่ 1'},{tpye:"พังงา",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารกระบี่'},{tpye:"สุราษฎร์ธานี",name:'ตลาดเกษตร 2'},
              {tpye:"นครศรีธรรมราช",name:'สถานีขนส่งผู้โดยสารนครศรีธรรมราช'},{tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารหาดใหญ่'},
              {tpye:"เกาะลันตา",name:'ท่าเรือหัวหิน'},
            ]
        });
        </script> -->

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
  <div class="col-md-4">
  <form method="post" action="{{url('serach1')}}" role="form" ng-app="app" ng-controller="form">
  {{csrf_field()}}
  <h1>จองตั๋วรถ</h1>
  <h2>เที่ยวรถที่ต้องการเดินทาง</h2>

    
      <label for="sel1">ต้นทาง</label>
      <select class="form-control" name="source" required ng-model="form.psource">
      @foreach($source as $s)
        <option value="{{$s->source}}">{{$s->source}} </option>
      @endforeach
      </select><br>
       <label for="sel1">จุดขึ้นรถ</label>
      <select class="form-control" name="psource" id ="id">
        <option ng-repeat="c in psources" ng-show="c.tpye ===
        form.psource">
                  [[c.name]]</option>
      </select>
      
      <br>
      <label for="sel1">ปลายทาง</label>
      <select class="form-control" name="endways" required ng-model="form.pendway">
       @foreach($endways as $e)
        <option value="{{$e->endways}}">{{$e->endways}}</option>
      @endforeach
      </select><br>
      <label for="sel1">จุดลงรถ</label>
      <select class="form-control" name="pendway" id ="id">
        <option ng-repeat="c in pendways" ng-show="c.tpye ===
        form.pendway">
                  [[c.name]]</option>
      </select>
      
 <br><br>
  <button id="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
   </form></div>
   <div class="col-md-2">
</div>
  <div class="col-md-6">
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
      <form class="form-horizontal" action="{{url('reserve_ticket')}}" method="POST" role="form">
      {!! csrf_field() !!}
      <input type="hidden" name="carrid_id" value="{{$c->carrid_id}}">
      <td><button type=submit id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> จอง</button></td>
      </form>
      </tr> 
      @endforeach
  
    </tbody>
    </thead>
  </table></div></div>
    </fieldset>
</div>
</form>

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
              {tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสาร แห่งที่ 1'},{tpye:"พังงา",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารกระบี่'},{tpye:"สุราษฎร์ธานี",name:'ตลาดเกษตร 2'},
              {tpye:"นครศรีธรรมราช",name:'สถานีขนส่งผู้โดยสารนครศรีธรรมราช'},{tpye:"หาดใหญ่",name:'สถานีขนส่งผู้โดยสารหาดใหญ่'},
              {tpye:"เกาะลันตา",name:'ท่าเรือหัวหิน'},
            ]
            $scope.pendways = [
              {tpye:"",name:''},
              {tpye:"ภูเก็ต",name:'สนามบินภูเก็ต'},{tpye:"ภูเก็ต",name:'โลตัสถลาง'},
              {tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสารภูเก็ตแห่ที่ 2'},{tpye:"ภูเก็ต",name:'สถานีขนส่งผู้โดยสารภูเก็ตแห่ที่ 1'},{tpye:"พังงา",name:'บขส.โคกกลอย'},{tpye:"พังงา",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารกระบี่'},{tpye:"กระบี่",name:'อ่าวลึก'},
              {tpye:"กระบี่",name:'ทับปุด'},{tpye:"กระบี่",name:'สถานีขนส่งผู้โดยสารพังงา'},
              {tpye:"กระบี่",name:'สนามบินภูเก็ต'},{tpye:"สุราษฎร์ธานี",name:'บขส.พังงา'},{tpye:"สุราษฎร์ธานี",name:'เขื่อนรัชชประภา'},
              {tpye:"สุราษฎร์ธานี",name:'ตลาดช้าง'},{tpye:"สุราษฎร์ธานี",name:'ตลาดเกษตร 2'},
              {tpye:"นครศรีธรรมราช",name:'ลำทับ'},{tpye:"นครศรีธรรมราช",name:'บางขัน'},
              {tpye:"นครศรีธรรมราช",name:'ทุ่งสง'},{tpye:"นครศรีธรรมราช",name:'สวนผัก'},{tpye:"นครศรีธรรมราช",name:'ร่อนพิบูลย์'},
              {tpye:"นครศรีธรรมราช",name:'ไม้หลา'},{tpye:"นครศรีธรรมราช",name:'หัวถนน'},
              {tpye:"นครศรีธรรมราช",name:'ปลายพระยา'},{tpye:"นครศรีธรรมราช",name:'บางสวรรค์'},{tpye:"นครศรีธรรมราช",name:'พระแสง'},
              {tpye:"นครศรีธรรมราช",name:'บ้านส้อง'},{tpye:"นครศรีธรรมราช",name:'ฉวาง'},
              {tpye:"นครศรีธรรมราช",name:'จันดี'},{tpye:"นครศรีธรรมราช",name:'ลานสกา'},
              {tpye:"นครศรีธรรมราช",name:'แยกเบญจมฯ'},{tpye:"นครศรีธรรมราช",name:'บขส.หัวอิฐ'},{tpye:"หาดใหญ่",name:'บขส.พังงา'},{tpye:"หาดใหญ่",name:'บขส.กระบี่'},
              {tpye:"หาดใหญ่",name:'บขส.ตรังแห่งที่ 2'},{tpye:"หาดใหญ่",name:'สี่แยกเอเชีย'},{tpye:"หาดใหญ่",name:'บขส.หาดใหญ่'},{tpye:"หาดใหญ่",name:'ตลาดเกษตร'},
              {tpye:"เกาะลันตา",name:'สนามบินกระบี่'},{tpye:"เกาะลันตา",name:'เหนือคลอง'},
              {tpye:"เกาะลันตา",name:'ห้วยน้ำขาว'},{tpye:"เกาะลันตา",name:'คลองท่อม'},{tpye:"เกาะลันตา",name:'ท่าเรือหัวหิน'},
            ]
        });
        </script>
</body>
</html>
