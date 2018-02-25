<!DOCTYPE html>
<html lang="en">
<head>

  <title>Booking van</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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


	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<h1>ตั๋วค่ารถตู้โดยสาร</h1>
						</div>
					</div>
					
				</div>
            </div>
			<br>
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">

                             <p><b>ชื่อผู้จอง :</b>
                             <td>
                                @if($name!=null)
                                  {{$name}}
                                @else
                                <?php 
                                    echo (DB::table('users')->where('id',Auth::user()->id)->value('fname'));
                                ?>
                                <?php 
                                    echo (DB::table('users')->where('id',Auth::user()->id)->value('lname'));
                                ?>
                                @endif
                            </td></p>
                            <p><b>เลขที่การจอง :</b>
                            <td>
                                {{$reservations[0]->id_res}}
                            </td>
                            </p>
                           
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						
					</div>
				</div>
            </div>
			<br><br>
            <div style="overflow-x:auto;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ต้นทาง</th>
                            <th>ปลายทาง</th>
                            <th>วันที่เดินทาง</th>
                            <th>เวลา</th>
                            <th>ที่นั่ง</th>
                            <th>ทะเบียนรถ</th>
                            <th>ช่องจอดรถ</th>
                            <th>ราคา</th>
                        </tr>
                    </thead>

                @foreach( $reservations as  $index => $item )
                    <tbody>
                        <tr>
                            <td>
                                <?php 
                                    echo (DB::table('carride_tbls')->where('carrid_id',$item->carrid_id)->value('source'));
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo (DB::table('carride_tbls')->where('carrid_id',$item->carrid_id)->value('endways'));
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo (DB::table('reservations')->where('id_res',$item->id_res)->value('date'));
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo (DB::table('reservations')->where('id_res',$item->id_res)->value('time_out'));
                                ?>
                            </td>
                            <td>{{$item->seat}}</td>
                            <td>
                                <?php 
                                    echo (DB::table('van_tbls')->where('id',$item->id_van)->value('id_van'));
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo (DB::table('van_tbls')->where('id',$item->id_van)->value('parking_box'));
                                ?>
                            </td>
                            <td>
                                <?php 
                                    echo (DB::table('points')->where('id_point',$item->id_point)->value('cost'));
                                ?> .-
                            </td>
                        </tr>
                        @endforeach
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td class="text-center"><h2>ราคารวม : </h2></td>
                           <td><br>{{$total}} .-</td>
                        </tr>
                    </tbody>
                
                </table>
            </div>
			
			
			
        </div>    
	</div>

