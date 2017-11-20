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

  <style>
  body {
    background-color:  #e6e6ff;
  }
  </style>
</head>
<body>

@include('navbar_1')
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
		@can('show',$item)
			<form method="post" action="reservations/{{$item->id_res}}" class="form-inline">
				<td><input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-xs"><i class="fa fa-ban"></i><span class="glyphicon glyphicon-remove"></span> Cancle</button> </td>
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
	<a href="reserve" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add List </a>
	<br>
	<br>
@endif

</body>
</html>

