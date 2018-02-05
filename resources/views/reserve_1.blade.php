<!DOCTYPE html>
<html>
<head>
	<title>
		หน้าจอง
	</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/step.css">
  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')
<div class="row bs-wizard" style="border-bottom:0;">
                
                <div class="col-xs-3 bs-wizard-step complete">
                  <div class="text-center bs-wizard-stepnum">Step 1</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">ค้นหาเที่ยวรถ</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 2</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">เลือกเวลาออกเดินทาง</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                  <div class="text-center bs-wizard-stepnum">Step 3</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">เลือกที่นั่ง</div>
                </div>
                
                <div class="col-xs-3 bs-wizard-step active"><!-- active -->
                  <div class="text-center bs-wizard-stepnum">Step 4</div>
                  <div class="progress"><div class="progress-bar"></div></div>
                  <a href="#" class="bs-wizard-dot"></a>
                  <div class="bs-wizard-info text-center">รอการชำระเงิน</div>
                </div>
            </div>     
        
  </div>
</div>
</div><br><br>
<div style="overflow-x:auto;">
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>ลำดับการจอง</th>
           <th>ชื่อผู้จอง</th>
           <th>ต้นทาง</th>
           <th>ปลายทาง</th>
		   <th>เวลาที่ออกเดินทาง</th>
           <th>วันที่ออกเดินทาง</th>
           <th>ที่นั่ง</th>
           <th>ราคา</th>
           <th></th>
           </tr>
          </thead>
@foreach( $reservations as  $index => $item )
		<tbody>
        <tr> 
		<td>{{$index+1}}</td>
		<td><?php 
		echo (DB::table('users')->where('id',$item->id)->value('fname'));
		?></td></td>
		<td><?php 
		echo (DB::table('carride_tbls')->where('carrid_id',$item->carrid_id)->value('source'));
		?></td>
		<td><?php 
		echo (DB::table('carride_tbls')->where('carrid_id',$item->carrid_id)->value('endways'));
		?></td></td>
		<td>{{$item->time_out}}</td>
		<td>{{$item->date}}</td>
		<td>{{$item->seat}}</td>
		<td><?php 
		echo (DB::table('points')->where('id_point',$item->id_point)->value('cost'));
		?></td></td>
		@can('show',$item)
			<form method="post" action="reservations/{{$item->id_res}}" class="form-inline">
				<td><input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Cancle</button> 
				{{csrf_field()}}
			</form>
		@endcan

	    </tr>
      </tbody>
@endforeach
</table>
</div>
<br>
@if ( !Auth::guest() )
	<a href="{{url('reserve')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add List </a>
  <a href="{{url('ticket')}}" class="btn btn-warning"><span class="glyphicon glyphicon-bitcoin"></span> ชำระเงิน </a>
	<br>
	<br>
@endif

</body>
</html>

