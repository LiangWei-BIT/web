<!DOCTYPE HTML>
<html>
<head>
<title>Human Voice Synthesis</title>

<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/lightbox.css">

<!-- jQuery (necessary JavaScript plugins) -->
<script type='text/javascript' src="js/jquery-1.11.1.min.js"></script>
<!-- Custom Theme files -->
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800|Titillium+Web:400,600,700,300' rel='stylesheet' type='text/css'>
<!-- Custom Theme files -->
<!--//theme-style-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	//session_start();
	$lang=0;
	if(empty($_GET["lang"])){
		$lang = "EN";
	}
	else{
		$lang = $_GET["lang"];
	}

	
	
	
?>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>


<style type="text/css">

		.bg {
            background: url('images/background.jpg');
			background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
			background-attachment: fixed;
 
        }
        .bg-blur {
			position: fixed;
			height: 100%;
			width: 100%;
            -webkit-filter: blur(15px);
            -moz-filter: blur(15px);
            -o-filter: blur(15px);
            -ms-filter: blur(15px);
            filter: blur(15px);
			z-index: 0;
        }

        .aspect {
			position: relative;
			z-index: 1;
        }
		.font_color_white {
			color: #FFFFFF;
		}
		.font_color_yellow {
			color: #FFDD48;
		}
		.font_size_20px {
			font-size: 20px;
		}
		.font_size_18px {
			font-size: 18px;
		}
		.font_size_17px {
			font-size: 17px;
		}
		.align_center {
			text-align: center;
		}
		
		
</style>
  
</head>
<body>

<!-- php -->


<!-- -->



<div class='bg bg-blur'></div>
<!-- header -->
<div class="aspect">
<div class="banner banner2 aspect">
	 <div class="container">
		 <div class="headr-right">
				
		 </div>
		 <div class="banner_head_top">
			  <div class="logo">
					 <h1><a href="index.php">Human Voice Synthesis</a></h1>
			 </div>	
			 <div class="top-menu">	 
			     <div class="content white">
					 <nav class="navbar navbar-default">
						 <div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>				
						 </div>
						 <!--/navbar header-->		
						 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							 <ul class="nav navbar-nav">
								 <li 
								 <?php 
									if($lang == "EN"){
										echo 'class="active"';
									}
								 ?>
								 ><a href="index.php?lang=EN">English</a></li>
								 
								 			

							 </ul>
							</div>
						  <!--/navbar collapse-->
					 </nav>
					  <!--/navbar-->
				 </div>
					 <div class="clearfix"></div>
					<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
			  </div>
				 <div class="clearfix"></div>
		  </div>

	 </div>	 
</div>

<!---->
<div class="welcome aspect">
	 <div class="container">
		 <div class="welcome-info">
				<!-- Welcome -->
				<h3>
				<?php
					if($lang=='EN'){
						echo 'Welcome';
					}
					
				?>
				</h3>
				<h4><?php
					if($lang == "EN"){
						echo "Here are the image-based human voices syntheses!";
					}
					
				?></h4>
				<!--<p>Morbi condimentum imperdiet placerat. Nullam in nisl eget turpis convallis venenatis. Cras cursus elementum justo nec bibendum. Donec quis nisi cursus, vestibulum elit eget, sagittis ligula.</p> -->
	     </div>
	 </div>
</div>
<!---->  


<div class="news-ltr">
<form action="index.php?lang=<?php echo $lang.'&total='.$total;?>" method="post" name="survey">

<div class="content aspect">
	<div class="container">
		
		<!-- part 1 -->
        <div class="information">
		    <div class="information_grid">
				<?php
					if($lang=='EN'){
						echo '<h4>Part 1</h4>';
						echo '<div class="font_color_white font_size_18px">';
						echo '
						<p> In this part, you can hear human voices synthesized under the constraints of the facial attributes (without emotion).  
						</p>
						
						';
						echo '</div>';
					}
				?>	
				<br>
				<?php
					for($i = 1;$i <= 36;$i++){
						echo'
						<img src="questions/'.$i.'.jpg" width="20%" alt="" /> &nbsp <br>
						<audio src="voices/'.$i.'.wav" controls="controls"></audio> <br>
						';
					}
				?>
			</div>
        </div>	
		
		<!-- part 2 -->
        <div class="information">
		    <div class="information_grid">
				<?php
					if($lang=='EN'){
						echo '<h4>Part 2</h4>';
						echo '<div class="font_color_white font_size_18px">';
						echo '
						<p> In this part, you can hear human voices synthesized under the constraints of the facial attributes (with emotion).  
						</p>
						
						';
						echo '</div>';
					}
				?>	
				<br>
				<?php
					for($i = 111;$i <= 113;$i++){
						echo'
						<img src="questions/'.$i.'.jpg" width="20%" alt="" /> &nbsp <br>
						<audio src="voices/'.$i.'.wav" controls="controls"></audio> <br>
						';
					}
				?>
			</div>
        </div>	

		<!-- part 3 -->
        <div class="information">
		    <div class="information_grid">
				<?php
					if($lang=='EN'){
						echo '<h4>Part 3</h4>';
						echo '<div class="font_color_white font_size_18px">';
						echo '
						<p> In this part, you can view the detailed number of the consistency evaluation and the comparison with manual editing.  
						</p>
						
						';
						echo '</div>';
					}
				?>	
				<br>
				<?php
					for($i = 1;$i <= 6;$i++){
						echo'
						<img src="questions/table'.$i.'.png" width="40%" alt="" /> &nbsp <br>
						
						';
					}
				?>
			</div>
        </div>			

		<!---->
	</div>
	
</div>
<script src="js/lightbox-plus-jquery.min.js"></script>

<!-- footer -->
<div class="footer aspect">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-6">
				 
				 <p>
					
				 <br><br>
				 
				 
				 <div class="clearfix"></div>
					 
			 </div>
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>
</form>
</div>
<!---->

<!---->
</div>
</body>
</html>