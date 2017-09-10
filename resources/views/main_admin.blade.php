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
  <form>
    <div class="form-group">
      <label for="sel1">ต้นทาง</label>
      <select class="form-control" id="sel1">
        <option>ภูเก็ต</option>
        <option>พังงา</option>
        <option>กระบี่</option>
        <option>สุราษธานี</option>
        <option>นครศรีธรรมราช</option>
      </select>
      <br>
      <label for="sel1">ปลายทาง</label>
      <select class="form-control" id="sel1">
        <option>ภูเก็ต</option>
        <option>พังงา</option>
        <option>กระบี่</option>
        <option>สุราษธานี</option>
        <option>นครศรีธรรมราช</option>
      </select>
      <br>
      <label for="sel1">วันที่ออกเดินทาง</label>
      <input class="form-control" type="date"></input>
    </div>
  </form>
  <button id="search" name="search" class="btn btn-info">Serch</button>
</div>
</div>
</div>



</body>
</html>
