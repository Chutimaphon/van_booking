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

@include('navbar_admin')
<div class="container">
 <div class="row">
  <div class="col-md-4">
  <form method="post" action="{{url('serach')}}">
  {{csrf_field()}}
  <h2>เที่ยวรถที่ต้องการเดินทาง</h2>
    <div class="form-group">
      <label for="sel1">ต้นทาง</label>
      <select class="form-control" name="source">
      @foreach($source as $s)
        <option value={{$s->source}} >{{$s->source}}</option>
      @endforeach
      </select>
      <br>
      <label for="sel1">ปลายทาง</label>
      <select class="form-control" name="endways">
       @foreach($endways as $e)
        <option value={{$e->endways}} >{{$e->endways}}</option>
      @endforeach
      </select>
      <br>
    </div>
  <button id="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-search"></span> Search</button>
   </form>
</div>
</div>
</div>
<div class="container">
<div class="row">
  <div class="col-md-5">
  <h2>เที่ยวรถ</h2>         
  <table class="table table-striped">
    <thead>
      <tr>
        
        <th>ต้นทาง</th>
        <th>ปลายทาง</th>
        <th>เวลาที่รถออก</th>
      </tr>
      <tbody>
    
      @foreach($carride_tbls as $c)
      <tr>   
       
       <td>{{$c->source}}</td>
       <td>{{$c->endways}}</td>
      <td>{{$c->time_out}}</td>
      </tr> 
      @endforeach
  
    </tbody>
    </thead>
  </table>
    </fieldset>
</div></div></div>
</form>
</body>
</html>