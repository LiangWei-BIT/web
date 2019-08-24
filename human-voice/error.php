<!DOCTYPE HTML>
<html>
<head>
<title>Home</title>

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
<meta name="keywords" content="This is the qustionnaire site of MCISLab. Beijing Insititute of Technology." />
<?php
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	//session_start();
	$lang=0;
	if(empty($_GET["lang"])){
		$lang = "EN";
	}
	else{
		$lang = $_GET["lang"];
	}
	
	echo '<meta http-equiv="refresh" content="4;url=index.php?lang='.$lang.'">' ;
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
			height: 1080px;
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
		.font_size_20px {
			font-size: 20px;
		}
		.align_center {
			text-align: center;
		}
		.newbutton p {
			color: #0dc5dd;
			font-size:1.8em;
			margin: 0;
			line-height: 1.4em;
		}
		.newbutton a{
			margin-top: 2.5em;
			display: inline-block;
			border: 1px solid #FFFFFF;
			color: #FFFFFF;
			font-size: .8em;
			padding: 8px 16px;
			text-decoration: none;
		}
		.newbutton a:hover{	
			border:1px solid #0dc5dd;
			color:#0dc5dd;
		}
		
</style>
  
</head>
<body>

<!-- php -->


<!-- -->



<div class='bg bg-blur'></div>
<!-- header -->
<div class="banner banner2 aspect">
	 <div class="container">
		 <div class="headr-right">
				<div class="details">
					<ul>
						<li><a href="mailto:409082492@qq.com"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>409082492@qq.com</a></li>
						<!-- <li><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>(+1)000 123 456789</li> -->
					</ul>
			  </div>
		 </div>
		 <div class="banner_head_top">
			  <div class="logo">
					 <h1><a href="index.php">MCIS<span class="glyphicon glyphicon-knight" aria-hidden="true"></span><span>Lab</span></a></h1>
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
								 ><a href="Finish.html?lang=EN">English</a></li>
								 <li><a>/</a></li>
								 <li
								 <?php 
									if($lang == "CN"){
										echo 'class="active"';
									}
								 ?>><a href="Finish.html?lang=CN">中文</a></li>			

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
						echo 'Offline now...';
					}
					else{
						echo '连接已断开..';
					}
				?>
				</h3>
				
				
				
				<h4><?php
					if($lang == "EN"){
						echo '<a href="index.php?lang=',$lang,'">This page will jump in 4s. If not, plesase click here.</a>';
					}
					else{
						echo '<a href="index.php?lang=',$lang,'">页面4秒钟后自动跳转，如果没有，请点击此处。</a>';
					}
				?></h4>
				<br>

				
	     </div>
	 </div>
</div>
<!---->  


<script src="js/lightbox-plus-jquery.min.js"></script>

<!-- footer -->
<div class="footer aspect">
	 <div class="container">
		 <div class="footer-grids">
			 <div class="col-md-3 ftr-grid">
				 <h3><?php 
					if($lang == 'EN'){
						echo 'Projects';
					}
					else{
						echo '我们的项目';
					}
				 ?></h3>
				 <ul class="ftr-list">
					 <li><a href="http://iitlab.bit.edu.cn/mcislab/~liangwei/Projects.html#">Human Cognition Of Contaiment Relations</a></li>
					 <li><a href="http://iitlab.bit.edu.cn/mcislab/~liangwei/Projects.html#">Head Pose Estimation</a></li>
					 <li><a href="http://iitlab.bit.edu.cn/mcislab/~liangwei/Projects.html#">Game Design</a></li>
					 <li><a href="http://iitlab.bit.edu.cn/mcislab/~liangwei/Projects.html#">HCI Application</a></li>
				 </ul>							 
			 </div>		 	
			 <div class="clearfix"></div>
		 </div>
	 </div>
</div>

<!---->
<div class="copywrite aspect">
	 <div class="container">
		 <p>Copyright &copy; 2017. <a href="http://iitlab.bit.edu.cn/mcislab/~liangwei/">MCISLab</a> Beijing Insititute of Technology  All rights reserved. - Author: Hangqing Wang</p>
	 </div>
</div>
<!---->

</body>
</html>