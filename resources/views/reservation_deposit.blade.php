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
<div style="overflow-x:auto;">

<?php $index = 0 ?>
<table class="table table-bordered">
          <thead class="thead-inverse">
           <tr>
           <th>ลำดับการจอง</th>
           <th>ชื่อสิ่งของ</th>
           <th>ประเภทสิ่งของ</th>
           <th>จำนวนชิ้น</th>
           <th>รายละเอียด</th>
           <th>ต้นทาง</th>
           <th>ปลายทาง</th>
		       <th>เวลาที่ออกเดินทาง</th>
           <th>วันที่ออกเดินทาง</th>
           <th>ราคา</th>
           <th>สถานะ</th>
           </tr>
          </thead>
          @if($reservations!=null)
@foreach( $reservations as  $index => $item )
		<tbody>
        <tr> <td>{{DB::table('deposits_reserves')->where('id',$item->id)->value('id')}}</td>
  		<td><?php 
      echo (DB::table('deposits_reserves')->where('id',$item->id)->value('name'));
      ?></td>
      @if(DB::table('deposits_reserves')->where('id',$item->id)->value('type')==1)
      <td>ซอง</td>
      @elseif(DB::table('deposits_reserves')->where('id',$item->id)->value('type')==2)
      <td>กล่องเล็ก</td>
      @elseif(DB::table('deposits_reserves')->where('id',$item->id)->value('type')==3)
      <td>กล่องกลาง</td>
      @elseif(DB::table('deposits_reserves')->where('id',$item->id)->value('type')==4)
      <td>กล่องใหญ่</td>
      @elseif(DB::table('deposits_reserves')->where('id',$item->id)->value('type')==5)
      <td>กล่องจัมโบ้</td>
      @else
      <td><?php 
      echo (DB::table('deposits_reserves')->where('id',$item->id)->value('type'));
      ?></td>
      @endif
      <td><?php 
      echo (DB::table('deposits_reserves')->where('id',$item->id)->value('amount'));
      ?></td>
      <td><?php 
      echo (DB::table('deposits_reserves')->where('id',$item->id)->value('detail'));
      ?></td>
  		<td><?php 
  		echo (DB::table('points')->where('id_point',$item->id_point)->value('psource'));
  		?></td>
  		<td><?php 
  		echo (DB::table('points')->where('id_point',$item->id_point)->value('pendway'));
  		?></td></td>
  		<td>{{$item->time_out}}</td>
  		<td>{{$item->date}}</td>
  		<td><?php 
      echo (DB::table('deposits_reserves')->where('id',$item->id)->value('price'));
      ?></td>
      <td>
         
           @if($item->status == "send")
         <form class="form-horizontal" action="{{url('/update_status')}}" method="POST" role="form">
          {!! csrf_field() !!}
          <input type="hidden" value="{{$item->id}}" name="id" >
          <button class="btn btn-warning btn-xs"><i class="fa fa-arrow-circle-left"></i> กำลังขนส่ง</button>
         </form>
         @elseif($item->status == "receive")
          <button class="btn btn-success btn-xs"><i class="fa fa-arrow-circle-right"></i> ได้รับของ </button>
         
         @endif
   
         
            <form action="{{url('/deletedeposit')}}" method="post">
         {!! csrf_field() !!}
         <input type="hidden" value="{{$item->id}}" name="id" >
         <button class="btn btn-danger btn-xs"><i class="  fa fa-remove"></i>ลบรายการ</button></form>
        
        </td>
  			
		
	    </tr>
      </tbody>
@endforeach
@endif
</table>
</div>
<center>
{{ $reservations->links() }} 
</center>
<br>
@if ( !Auth::guest() )
	<a href="{{url('deposit')}}" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Add List </a>
	<br>
	<br>
@endif
</body>
</html>


