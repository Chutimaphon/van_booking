<!DOCTYPE html>
<html lang="en">
<head>

  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

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
  <div class="col-md-4">
  <h2>บันทึกรถตู้ประจำทาง</h2>
  <form>
     <div class="form-group">
      <label for="inputdefault">เลขทะเบียนรถ</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="inputdefault">ยี่ห้อรถ</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="inputdefault">จำนวนที่นั่งภายในรถ</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="sel1">ช่องที่จอดรถ</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    
  </form>
  <button id="search" name="search" class="btn btn-success">Save</button>
  <button id="search" name="search" class="btn btn-info">Edit</button>
</div>
</div></div><br><br>
<div class="container">
  <h2>เที่ยวรถ</h2>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>เลขทะเบียนรถ</th>
        <th>ยี่ห้อรถ</th>
        <th>จำนวนที่นั่งภายในรถ</th>
        <th>ช่องที่จอดรถ</th>
      </tr>
      <tbody>
      <tr>
  
      </tr>
      <tr>
       
      </tr>
      <tr>
       
      </tr>
    </tbody>
    </thead>
  </table>
</div>

</body>
</html>
</body>
</html>