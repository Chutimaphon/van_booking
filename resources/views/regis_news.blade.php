<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
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
<form class="form-horizontal" action="{{url('news')}}" method="POST" role="form">
                    {!! csrf_field() !!}
                    <fieldset>

@include('navbar_admin')

<div class="container">
<div class="row">
  <div class="col-md-4">
  <h2>บันทึกข่าวประชาสัมพันธ์</h2>
    <div class="form-group">
      <label for="inputdefault">หัวข้อข่าว</label>
      <input class="form-control" name="name"id="inputdefault" type="text" required="">
    </div>
    <div class="form-group">
      <label for="inputdefault">รายละเอียด</label>
      <textarea rows="10" cols="80" name="details"id="inputdefault" required=""></textarea>
    </div>
   
  <button id="submitbutton" name="submitbotton" class="btn btn-success"><span class="glyphicon glyphicon-saved"></span> Save</button>

</div>
</div></div><br><br>
<div class="container">
<div class="row">
  <div class="col-md-12">
  <h2>ข่าวสาร</h2>      
  <table class="table table-striped">
    <thead>
      <tr>
        <th>หัวข้อข่าว</th>
        <th>รายละเอียด</th>
      </tr>
      <tbody>
    @foreach($news_tbls as $c)
      <tr>   
       <td>{{$c-> name}}</td>
       <td>{{$c-> details}}</td>
    <td><a href="{{url('/updatenews')}}/{{$c->id_news}}" id="search" name="search" class="btn btn-info"><span class="glyphicon glyphicon-edit"></span> Edit</a></td>
      <td><a href="{{url('/deletenews')}}/{{$c->id_news}}" id="search" name="search" class="btn btn-danger" onclick="return confirm('Are you sure to delete ?')"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>
      </tr> 
      @endforeach
    </tbody>
    </thead>
  </table><center>
    {{ $news_tbls->links() }}
</div></div></div></center>
</form>
<script type="text/javascript">
        $(document).ready(function () {
            $('#confirm').on('click', function (e) {
                $('#deletes').trigger('submit');
            });
        });
    </script>
</body>
</html>
