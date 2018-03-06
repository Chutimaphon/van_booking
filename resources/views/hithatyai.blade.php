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
  <link rel="stylesheet" type="text/css" href="/css/boxtext.css">

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')<br>
<h3><span class="glyphicon glyphicon-tree-deciduous"></span> ตลาดกิมหยง</h3>
<h5>อัพเดตล่าสุดเมื่อ : 14 พฤศจิกายน 2560</h5><br><br>

<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>


<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- begin panel group -->
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                <!-- panel 1 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab1" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingOne"data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h1 class="panel-title">  <span class="glyphicon glyphicon-tree-deciduous"></span> <B>ตลาดกิมหยง</B></h1>
                        </div>
                    </span>
                    
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        <h4>ไม่ว่าจะเที่ยวหาใหญ่ทั่วค่ไหน แต่ถ้าไม่ได้เดินที่นี่ ขอบอกว่าเหมือนมาไม่ถึงอยู่ดี <B>ตลาดกิมหยง</B> ตลาดขนาดใหญ่มีของมากมาย นำเข้าจากมาเลเซียบ้าง อินโดนีเซียบ้าง ราคาจะถุกกว่าซื้อตามห้งทั่วไป สินค้าฮอตฮิตที่ขึ้นื่อได้แก่ พวกเม็ดมะม่วงหิมพานต์อบ อัลมอนด์อบ ถั่วพิสทาชิโอ เกาลัด ผลไม้คุณภาพ ผลไม้อบแห้ง กระเป๋า เสื้อผ้า เครื่องใช้ไฟฟ้า ให้จับจายใช้สอยกันได้สบายๆ สำหรับขสช๊อปเดินได้ทั้งแต่เช้ายันเย็น</h4>
                        </div>
                    </div>
                </div> 
                <!-- / panel 1 -->
                
                <!-- panel 2 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab2" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title"> <span class="glyphicon glyphicon-tree-conifer"></span> <B>การเดินทางไปตลาดกิมหยง </B> </h4>
                        </div>
                    </span>

                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                        <!-- Tab content goes here -->
                        <h4><i class="fa fa-car" aria-hidden="true"></i>
                        <B>การเดินทางโดยรถตู้</B><br><br>
                        <li>นั่งรถจากสถานีขนส่งผู้โดยสารภูเก็ต <br>ตั้งแต่เวลา 08.0 น. - 16.00 น.<br>ราคา 260 บาท</li><br>
                        <B>การเดินทางโดยรถสาธารณะ</B><br><br><li>นั่งรถตุ๊กตุ๊กจาก บขส.หาดใหญ่ไปตลาดกิมหยง ระยะทางไม่กี่กิโลเมตร</li> 
                        </h4>
                        </div>
                    </div>
                </div>
                <!-- / panel 2 -->
                
                <!--  panel 4 -->
                <div class="panel panel-default">
                    <!--wrap panel heading in span to trigger image change as well as collapse -->
                    <span class="side-tab" data-target="#tab3" data-toggle="tab" role="tab" aria-expanded="false">
                        <div class="panel-heading" role="tab" id="headingThree"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title"> <span class="glyphicon glyphicon-check"></span><B> จองตั๋วเดินทาง</B> </h4>
                        </div>
                    </span>

                        <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                          <!-- tab content goes here -->
                           <form action="/hithatyai" method="POST">
                           {{csrf_field()}}
                           <button type="submit" class="btn btn-primary btn-lg btn-block btn-huge">จองตั๋ว</a>
                          <input type="hidden" name="source" value="ภูเก็ต"></input> 
                          <input type="hidden" name="endways" value="หาดใหญ่"></input> 
                         </form>
                          </div>
                        </div>
                      </div>
            </div> <!-- / panel-group -->
             
        </div> <!-- /col-md-4 -->
        
        <div class="col-md-8">
            <!-- begin macbook pro mockup -->
            <div class="md-macbook-pro md-glare">
                <div class="md-lid">
                    <div class="md-camera"></div>
                    <div class="md-screen">
                    <!-- content goes here -->                
                        <div class="tab-featured-image">
                            <div class="tab-content">
                                <div class="tab-pane  in active" id="tab1">
                                        <img src="https://pbs.twimg.com/media/ClinxkGUYAAKCTZ.jpg" width="70%" height="70%" alt="tab1" class="img img-responsive">
                                </div>
                                <div class="tab-pane " id="tab2">
                                    
                                        <img src="http://www.hatyaicity.go.th/files/com_fun/2016-09_0796250b7366217.jpg"width="100%" height="100%">
                                    
                                </div>
                                <div class="tab-pane fade" id="tab3">
                                      
                                        <img src="http://cdn.airportthai.co.th/uploads/profiles/0000000004/filemanager/images/%E0%B8%95%E0%B8%A5%E0%B8%B2%E0%B8%94%E0%B8%81%E0%B8%B4%E0%B8%A1%E0%B8%AB%E0%B8%A2%E0%B8%87.jpg"width="90%" height="90%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="md-base"></div>
            </div> <!-- end macbook pro mockup -->



        </div> <!-- / .col-md-8 -->
    </div> <!--/ .row -->
</div> <!-- end sidetab container -->
<br><br>
<marquee direction="left"><img src="https://files.gathersheet.com/images/sticker/travel/thailand-travel/0.png" width="10%" height="10%"></marquee>
