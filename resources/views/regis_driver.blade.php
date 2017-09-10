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
  <h2>บันทึกประวัติคนขับรถตู้</h2>
  <form>
    <div class="form-group">
      <label for="inputdefault">ชื่อ</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="inputdefault">นามสกุล</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="sel1">ที่อยู่</label>
      <input class="form-control" id="inputdefault" type="text">
    </div>
    <div class="form-group">
      <label for="sel1">เบอร์โทรศัพท์</label>
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
        <th>เลขที่คนขับรถ</th>
        <th>ชื่อ</th>
        <th>นามสกุล</th>
        <th>ที่อยู่</th>
        <th>เบอร์โทรศัพท์</th>
      </tr>
      <tbody>
       @foreach($carride_tbls as $c)
      <tr>
       <td>{{$c->source}}</td>
       <td></td>
       <td></td>
      <td></td>
      </tr> 
      @endforeach
    </tbody>
    </thead>
  </table>
</div>

</body>
</html>
</body>
</html>