<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{asset('/css/bootstrap-formhelpers.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <script type="{{asset('/js/app.js')}}"></script>
  <!-- language files -->
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-countries.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-states.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-currencies.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-languages.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-timezones.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-fonts.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-fontsizes.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-googlefonts.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-phone.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-datepicker.en_US.js')}}"></script>
  <script src="{{asset('js/lang/en_US/bootstrap-formhelpers-timepicker.en_US.js')}}"></script>
  
  <!-- plugin sources -->
  <script src="{{asset('js/bootstrap-formhelpers-selectbox.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-countries.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-states.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-currencies.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-languages.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-timezones.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-fonts.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-fontsizes.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-googlefonts.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-phone.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-datepicker.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-timepicker.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-slider.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-colorpicker.js')}}"></script>
  <script src="{{asset('js/bootstrap-formhelpers-number.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="css/step.css">
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
    <div class="col-md 6">
      <h1>จองตั๋วรถ</h1>

          <div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step active">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">ค้นหาเที่ยวรถ</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step disabled"><!-- complete -->
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
</div>

   

 
  <form method="post" action="{{url('/reserve_2')}}" role="form" ng-app="app" ng-controller="form">
  {{csrf_field()}}
  <br><br>
<div class="container">
   <div class="row">   
<div class="col-md-4">
   <h2>เที่ยวรถที่ต้องการเดินทาง</h2> <br><br></div></div></div>

<div class="container">
<div class="row">
<div class="alert alert-danger"><strong><center>หมายเหตุ!! ผู้โดยสารสามารถพกพาสัมภาระมาได้ไม่เกิน 5 กิโลกรัม </center></strong></div><br>
<div class="col-md-4"></div>
        <div class="col-md-2">
         @if($twoway)
             <a href="reserve"  class="btn btn-primary btn-lg btn-block btn-huge">เที่ยวเดียว</a>
             @else
            <a id="reserve1"  class="btn btn-danger btn-lg btn-block btn-huge">เที่ยวเดียว</a>
            @endif
        </div>
        <div class="col-md-2">
            @if($twoway)
                <a href="{{url('/twoway')}}" class="btn btn-danger btn-lg btn-block btn-huge">ไป-กลับ</a>
            @else
                <a id="reserve2" href="{{url('/twoway')}}" class="btn btn-primary btn-lg btn-block btn-huge">ไป-กลับ</a>
            @endif
        </div>
          
        </div></div><br><br>
    
<div class="container">
@if (count($errors) > 0)   
<div class="row">

  <div class="col-md-3"></div>
  <div class="col-md-6">
  <div class="alert alert-danger">
      {{$errors}}
  </div>
  </div>
  <div class="col-md-3"></div>

</div>  
@endif
<div class="row">
<div class="col-md-3"></div>
<div class="col-md-6">
      @if(!Auth::check())
          <label for="name">ชื่อผู้จอง : </label><input type="text" name="name"  id="date" class="form-control" >
          <label for="name">เบอร์โทรศัพท์ผู้จอง : </label><input type="text" name="tel" class="input-medium bfh-phone form-control" data-format="dd-dddd-dddd">
      @endif
     <label for="sel1">ต้นทาง :</label>
      
      <select class="form-control" name="source" required ng-model="form.psource">
      @foreach($source as $s)
        <option value="{{$s->source}}">{{$s->source}} </option>
      @endforeach
      </select><br>
       <label for="sel1">จุดขึ้นรถ :</label>
      <select class="form-control" name="psource" id ="id">
        <option  ng-repeat="c in psources" ng-show="c.tpye ===
        form.psource">
                  [[c.name]]</option>
      </select>
      
      <br>
      <label for="sel1">ปลายทาง :</label>
      <select class="form-control" name="endways" required ng-model="form.pendway">
       @foreach($endways as $e)
        <option value="{{$e->endways}}">{{$e->endways}}</option>
      @endforeach
      </select><br>
      <label for="sel1">จุดลงรถ :</label>
      <select class="form-control" name="pendway" id ="id">
        <option ng-repeat="c in pendways" ng-show="c.tpye ===
        form.pendway">
                  [[c.name]]</option>
      </select><br>

         <label for="date">วันที่ออกเดินทาง : </label><input type="date" name="datein" id="date" class="form-control" >

    @if(isset($delete) && $delete== 1 )<br>
      <label for="date">วันที่เดินทางกลับ : </label><input type="date" name="dateout" id="date" class="form-control" >
    @endif

 <br><br>
  @if($twoway)
       <button id="submit" formaction="reserve_3" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
  @else
       <button id="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
  @endif

  
 <br><br><br><br></div>


</div>
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
</body>
</html>
