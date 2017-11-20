<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>เส้นทางเดินรถ
                <div class="pull-right"> </div>
            </h3>
        </div>
        <div id="toolbar-admin" class="panel-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>เส้นทางเดินรถ</th>
                    <th>เส้นทางที่รถเดินทางผ่าน</th>
                    <th>ท่ารถ(จุดขึ้นรถ)</th>
                </tr>
            </thead>
            <tbody>
                <tr class="danger">
                    <td>ภูเก็ต-พังงา</td>
                    <td>บขส.โคกกลอย - บขส.พังงา</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="success">
                    <td>ภูเก็ต-กระบี่</td>
                    <td>สนามบินภูเก็ต - บขส.พังงา - ทับปุด - อ่าวลึก - บขส.กระบี่</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="warning">
                    <td>ภูเก็ต-สุราษฎร์ธานี</td>
                    <td>บขส.พังงา - เขื่อนรัชชประภา - ตลาดช้าง - ตลาดเกษตร2</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="danger">
                    <td>ภูเก็ต-นครศรีธรรมราช</td>
                    <td>ลำทับ - บางขัน - ทุ่งสง - สวนผัก - ร่อนพิบูลย์ - ไม้หลา - หัวถนน</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="success">
                    <td>ภูเก็ต-นครศรีธรรมราช</td>
                    <td>ปลายพระยา - บางสวรรค์ - พระแสง - บ้านส้อง - ฉวาง - จันดี - ลานสกา - แยกเบญจมฯ - บขส.หัวอิฐ</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="warning">
                    <td>ภูเก็ต-หาดใหญ่</td>
                    <td>ภูเก็ต - พังงา - กระบี่ - ตรัง - พัทลุง - หาดใหญ่</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="danger">
                    <td>ภูเก็ต-เกาะลันตา</td>
                    <td>สนามบินกระบี่ - เหนือคลอง - ห้วยน้ำขาว - คลองท่อม - ท่าเรือหัวหิน</td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="success">
                    <td>พังงา-ภูเก็ต</td>
                    <td> บขส.พังงา - บขส.โคกกลอย - โลตัสถลาง - บขส.ภูเก็ตแห่งที่2 </td>
                    <td>บขส.พังงา</td>
                </tr>
                <tr class="warning">
                    <td>กระบี่-ภูเก็ต</td>
                    <td> บขส.กระบี่ - อ่าวลึก - ทับปุด - บขส.พังงา - สนามบินภูเก็ต - บขส.ภูเก็ตแห่งที่2</td>
                    <td>บขส.กระบี่</td>
                </tr>
                 <tr class="danger">
                    <td>สุราษฎร์ธานี-ภูเก็ต</td>
                    <td>ตลาดเกษตร2 - ตลาดช้าง - เขื่อนรัชชประภา - บขส.พังงา - บขส.ภูเก็ตแห่งที่2 </td>
                    <td>บขส.ภูเก็ตแห่งที่ 1</td>
                </tr>
                <tr class="success">
                    <td>นครศรีธรรมราช-ภูเก็ต</td>
                    <td>สามแยกบ้านตาล - ลานสกา - จันดี - ฉวาง - บ้านส้อง - พระแสง - บางสวรรค์ - ปลายพระยา - เขาต่อ</td>
                    <td>บขส.นครศรีธรรมราช</td>
                </tr>
                 <tr class="warning">
                    <td>หาดใหญ่-ภูเก็ต</td>
                    <td>หาดใหญ่ - พัทลุง - ตรัง - กระบี่ -  พังงา - ภูเก็ต </td>
                    <td>บขส.หาดใหญ่แห่งที่ 1 (ตลาดเกษตร)</td>
                </tr>
                <tr class="danger">
                    <td>เกาะลันตา-ภูเก็ต</td>
                    <td>ท่าเรือหัวหิน - คลองท่อม - ห้วยน้ำขาว - เหนือคลอง - สนามบิน - กระบี่  </td>
                    <td>คิวรถตู้เกาะลันตา-ภูเก็ต</td>
                </tr>

            </tbody>
        </table>        
        </div>
          </div>
            </div>
            <!-- <marquee direction="right"><img src="https://hrdave.files.wordpress.com/2011/02/moving.gif"></marquee> -->
            <marquee behavior="alternate"><img src="https://hrdave.files.wordpress.com/2011/02/moving.gif" height="100"></marquee> 
    </div>
  </div>
</div>


</form>
</body>
</html>