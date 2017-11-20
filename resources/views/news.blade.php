<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/news.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
	// Carousel Auto-Cycle
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 6000
    })
  });

</script>

</head>
<body>
@include('navbar_1')
<div class="container">
<div class="col-xs-12">

    <div class="page-header">
        <h3>ข่าวประชาสัมพันธ์</h3>
        <p>News</p>
    </div>
 
       

    <div class="carousel slide" id="myCarousel">
        <div class="carousel-inner">
        <?php $i=0; $j=0;?>
        @foreach($newgets as $c)
        	@if($i==0)
            <div class="item active">
                    <ul class="thumbnails">
            @elseif($j==0)
            <div class="item">
                    <ul class="thumbnails">
            @endif
                   
                   
                        <li class="col-sm-3">
    						<div class="fff">
								<div class="thumbnail">
									<a href="#"><img src="http://placehold.it/360x240" alt=""></a>
								</div>
								<div class="caption">
									<h4>  {{$c->name}}</h4>
									<p>{{$c->details}}</p>
									<a class="btn btn-mini" href="#">» Read More</a>
								</div>
                            </div>
                        </li>
                         <?php $j++; ?>
              @if($j==2)
                    </ul>
              </div><!-- /Slide1 -->
              <?php $i++; $j=0; ?>
              @endif 
           @endforeach
        </div>
        
       
	   <nav>
			<ul class="control-box pager">
				<li><a data-slide="prev" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-left"></i></a></li>
				<li><a data-slide="next" href="#myCarousel" class=""><i class="glyphicon glyphicon-chevron-right"></i></li>
			</ul>
		</nav>
	   <!-- /.control-box -->   
                              
    </div><!-- /#myCarousel -->

    </body>
</html>
        
</div><!-- /.col-xs-12 -->          

</div><!-- /.container -->