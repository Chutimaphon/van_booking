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
  <!-- <link rel="stylesheet" type="text/css" href="/css/boxtext.css"> -->
  <link rel="stylesheet" type="text/css" href="/css/stepreserve.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')<br>
<h2>ขั้นตอนการจอง</h2>
<div class="container">
    <div class="row">
    <div class="col-md-12">

      <div class="tabbable-panel">
        <div class="tabbable-line">
          <ul class="nav nav-tabs ">
            <li class="active">
              <a href="#tab_default_1" data-toggle="tab">
              Step 1 </a>
            </li>
            <li>
              <a href="#tab_default_2" data-toggle="tab">
              Step 2 </a>
            </li>
            <li>
              <a href="#tab_default_3" data-toggle="tab">
              Step 3 </a>
            </li>
            <li>
              <a href="#tab_default_4" data-toggle="tab">
              Step 4 </a>
            </li>
            <li>
              <a href="#tab_default_5" data-toggle="tab">
              Step 5 </a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab_default_1">
              <h3><font color="red"> Step 1 </font></h3><br>
              <h4>เมื่อ Login เข้ามาจะเจอปุ่มจองตั๋ว </h4><br>
            <center>
            <div class="thumbnail">
                  <div class="boxes">
            <img src="img/pic1.png" width="1125" height="700">
           </div></div> </center> 
                           
            </div>
            <div class="tab-pane" id="tab_default_2">
             <h3><font color="red"> Step 2 </font></h3><br>
             <h4>เลือกเที่ยวรถที่จะเดินทาง , ต้นทางที่ขึ้นรถ , ปลายทางที่ลงรถ , วันที่ออกเดินทาง และกดปุ่ม Search เพื่อค้นหาเที่ยวรถของท่านที่ต้องการเดินทาง </h4><br>
             <center>
             <div class="thumbnail">
                  <div class="boxes">
             <img src="img/pic2.png" width="1125" height="600">
             </div></div></center>
              
            </div>
            <div class="tab-pane" id="tab_default_3">
              <h3><font color="red"> Step 3 </font></h3><br>
             <h4>เลือกเวลาที่ต้องการจะเดินทาง แล้วเลือกปุ่มจอง </h4><br>
             <center>
             <div class="thumbnail">
                  <div class="boxes">
             <img src="img/pic3.png" width="1125" height="600">
             </div></div></center>
            
            </div>

            <div class="tab-pane" id="tab_default_4">
              <h3><font color="red"> Step 4 </font></h3><br>
             <h4>เลือกที่นั่งที่ต้องการ แล้วกดปุ่มจอง </h4><br>
             <center>
             <div class="thumbnail">
                  <div class="boxes">
             <img src="img/pic4.png" width="1125" height="700">
             </div></div></center><br>
             <h4>ถ้าแสดง <span style="color:red;" class="glyphicon glyphicon-remove"></span> หมายความว่า ที่นั่งนั้นมีการจองแล้ว </h4><br>
             <center>
             <div class="thumbnail">
                  <div class="boxes">
             <img src="img/pic5.png" width="1125" height="600">
             </div></div></center><br>
            
            </div>

            <div class="tab-pane" id="tab_default_5">
              <h3><font color="red"> Step 5 </font></h3><br>
             <h4>เมื่อจองสำเร็จจะขึ้นมาหน้านี้ เพื่อให้สามารถยกเลิกการจอง , เพิ่มการจอง และชำระเงิน </h4><br>
             <center>
             <div class="thumbnail">
                  <div class="boxes">
             <img src="img/pic6.png" width="1125" height="380">
             </div></div></center>
            
            </div>
          </div>
        </div>
      </div>