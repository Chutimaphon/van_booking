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

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')

<div class="middlePage">
  <div class="page-header">
    <h3 class="logo">ตรวจสอบสถานะการจอง</h3>
  </div>
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title">กรุณากรอกรหัสการจองและหมายเลขโทรศัพท์ของท่าน เพื่อตรวจสอบสถานะการจองบัตรโดยสาร</h3>
      </div>
        <div class="panel-body">
          <form action="{{ route('password.update') }}" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}
              <div class="form-group{{ $errors->has('old') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">รหัสการจอง</label>
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="old">
                      <span class="help-block"></span>                    
                  </div>
              </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label for="password" class="col-md-4 control-label">หมายเลขโทรศัพท์</label>
                    <div class="col-md-6">
                      <input id="password" type="password" class="form-control" name="password">
                        <span class="help-block"></span>
                    </div>
                </div>
              <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
              </div>
          </form>
                </div>
             </div>
        </div>
    </div>
</div>