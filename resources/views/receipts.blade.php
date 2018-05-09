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
  <link rel="stylesheet" type="text/css" href="css/buttonbig.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_admin')


<div class="container">
<div class="row">
<h2>รายรับ ตั๋ว :</h2><br>
<div class="col-md-3">
<form method="post" action="{{url('/show_income_each')}}" role="form" ng-app="app" ng-controller="form">
{!! csrf_field() !!}

<label for="date">เดือนที่ต้องการแสดง : </label><input type="month" id="res_datepicker" name="date_month" class="form-control" onchange="res_change()" ><br>

</form>
</div>
</div>
@if(isset($total_data))
 <table id="tableup" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>รายรับ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($total_data as $t)
                        <tr name="res[]">
                            <td>
                                {{$t['date']}}
                            </td>
                            <td>
                                {{$t['income']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody></table>@endif
</div>


<div class="container">
<div class="row">
<h2>รายรับ ฝากของ :</h2><br>
<div class="col-md-3">

<label for="date">เดือนที่ต้องการแสดง : </label> <input type="month" id="depose_datepicker" name="date_month" class="form-control" onchange="depose_change()" ><br>

</form>
</form>
</div>
</div>
<p id="demo"></p>
@if(isset($total_data_depos))
 <table id="tableup" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>รายรับ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($total_data_depos as $t)
                        <tr name="des[]" >
                            <td>
                                {{$t['date']}}
                            </td>
                            <td>
                                {{$t['income']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody></table>@endif
</div>
<script type="text/javascript">
var des = document.getElementsByName("des[]");
var temp=new Array();
for(var i=0; i<des.length;i++)
{
  temp.push(des[i].cells[0].innerText);
}
var res = document.getElementsByName("res[]");
var temp_res=new Array();
for(var i=0; i<res.length;i++)
{
  temp_res.push(res[i].cells[0].innerText);
}

  function depose_change(){
    var datepicker = document.getElementById("depose_datepicker").value;
    

   for(var i=0; i<des.length;i++)
   {
    if(temp[i]==datepicker)
       des[i].style.display = '';
     else
      des[i].style.display = 'none';
   }
    
  }

  function res_change(){
    var datepicker = document.getElementById("res_datepicker").value;
    

   for(var i=0; i<res.length;i++)
   {
    if(temp_res[i]==datepicker)
       res[i].style.display = '';
     else
      res[i].style.display = 'none';
   }
    
  }
</script>
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