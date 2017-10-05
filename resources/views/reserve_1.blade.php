<!DOCTYPE html>
<html>
<head>
	<title>
		หน้าจอง
	</title>
</head>
<body>
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
			<form method="post" action="reservations/{{$item->id}}" class="form-inline">
				<td><input type="hidden" name="_method" value="Delete">
				<button class="btn btn-danger btn-xs"><i class="fa fa-ban"></i> ยกเลิก</button> </td>
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
	<a href="reserve" class="btn btn-success"> เพิ่มรายการ </a>
	<br>
	<br>
@endif

</body>
</html>

