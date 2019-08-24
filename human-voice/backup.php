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
	//排序对象
	class node{
		var $id;
		var $times;
		function __construct($a,$b){
			$this->id = $a;
			$this->times = $b;
		}
		function getid(){
			return $this->id;
		}
		function gettimes(){
			return $this->times;
		}
	}
	
	//检测输入
	function test_input($data) {
	   $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	
	//排序比较函数
	function cmp($a,$b){
		if($a->times>$b->times)	return 1;
		return -1;
	}
	
	//session_start();
	$lang=0;
	if(empty($_GET["lang"])){
		$lang = "CN";
	}
	else{
		$lang = $_GET["lang"];
	}

	session_start();
	$qlist = array();				//所有问题数组
	$questions = array(0,1,2,3,4);	//显示问题数组
	$container = array(-1,-1,-1,-1,-1);
	$pose = array(-1,-1,-1,-1,-1);
	$q1 = 0;
	$NickName = '';
	$total = 0;
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(!isset($_SESSION['questions'])){
			echo '<meta http-equiv="refresh" content="0;url=error.php?lang='.$lang.'">' ;
		}
		else{
			$questions = $_SESSION['questions'];
			$total = $_SESSION['total'];
			$flag = 0;
			
			for($i = 1;$i < 6;$i++){
				if(empty($_POST["C".$i])||empty($_POST["p".$i])){
					if($flag==0) $flag = $i;
				}
				if(!empty($_POST["C".$i])){
					$q1 = $i;
					$container[$i-1] = $_POST["C".$i];
				}
				if(!empty($_POST["p".$i])){
					$pose[$i-1] = $_POST["p".$i];
				}
			}
			if(!empty($_POST["NickName"])) $NickName = test_input($_POST["NickName"]);
			
			$_SESSION['container'] = $container;
			$_SESSION['pose'] = $pose;
			
			
			if($flag != 0){//有问题尚未回答
				echo '<script>alert("';
				if($lang == 'EN'){
					echo 'Question '.$flag.' is not finished.';
				}
				else{
					echo '您还没有回答问题'.$flag;
				}
				echo '")</script>';
				
			}
			else{
				if($NickName == 'NickName'||$NickName == '请输入昵称'||$NickName == ''){//未输入昵称
					echo '<script>alert("';
					if($lang == 'EN'){
						echo 'Please fill your nickname.';
					}
					else{
						echo '请输入您的昵称';
					}
					echo '")</script>';
					
				}
				else{//成功
					
					//Load the frequency now.
					$file = fopen("datas/frequency","r");
					for($i=0;$i < $total;$i++){
						if(!feof($file)) $tmp = (int)fgets($file);
						else $tmp = 0;
						$qlist[$i] = $tmp;
					}
					fclose($file);
					
					for($i=0;$i<5;$i++){
						$qlist[$questions[$i]]++;
					}
					
					
					//Rewrite the frequency
					$file = fopen("datas/frequency","w");
					for($i=0;$i<$total;$i++){
						fwrite($file,$qlist[$i]."\n");
					}
					fclose($file);
					
					//Write the result.
					$file = fopen("datas/results","a");
					for($i=0;$i<5;$i++){
						fwrite($file,$questions[$i]." ".$NickName." ".$container[$i]." ".$pose[$i]."\n");
					}
					fclose($file);
				
					echo '<meta http-equiv="refresh" content="0;url=finish.php?lang='.$lang.'">' ;
					
				}
			}
		}
	}
	else{
		if(!isset($_SESSION['questions'])){
			$file = fopen("datas/total","r");
			$total = (int)fgets($file);
			fclose($file);
			
			
			$file = fopen("datas/frequency","r");
			for($i=0;$i<$total;$i++){
				if(!feof($file)) $tmp = (int)fgets($file);
				else $tmp = 0;
				$qlist[$i] = new node($i,$tmp);
			}
			fclose($file);
			usort($qlist,'cmp');
			for($i=0;$i<5;$i++){
				$questions[$i] = $qlist[$i]->getid();
			}
			$_SESSION['total'] = $total;
			$_SESSION['questions'] = $questions;
		}
		else{
			$questions = $_SESSION['questions'];
			$total = $_SESSION['total'];
			if(isset($_SESSION['container'])) $container = $_SESSION['container'];
			if(isset($_SESSION['pose'])) $pose = $_SESSION['pose'];
		}
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
								 ><a href="index.php?lang=EN">English</a></li>
								 <li><a>/</a></li>
								 <li
								 <?php 
									if($lang == "CN"){
										echo 'class="active"';
									}
								 ?>><a href="index.php?lang=CN">中文</a></li>			

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
					else{
						echo '欢迎您的到来';
					}
				?>
				</h3>
				
				
				
				<h4><?php
					if($lang == "EN"){
						echo "This is an experiment about human congnition. <br>We prepared 5 fun questions. <br> It takes several seconds to finish them. <br>Thanks for your participation!";
					}
					else{
						echo "这是一个与认知有关的实验。<br>我们为您精心准备了5个简短有趣的小问题，可能会占用您几十秒的时间。<br>非常感谢您的参与！";
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
		<!-- 关于问卷的提示 -->
		<div class="information">
			<div class="information_grid">
				<?php
					if($lang=='EN'){
						echo '<h4>Tips</h4>';
						echo '<div class="font_color_white font_size_20px">';
						echo '
						<p> In this experiment, you are told to carry objects on the left with a container on the right. Please choose the best container and the best gesture to finish this job.
						
						</p>
						
						';
						echo '</div>';
					}
					else{
						echo '<h4>小提示</h4>';
						echo '<div class="font_color_white font_size_20px">';
						echo '
						<p> 在这个实验中，你需要用右边的一个容器来装左边的物品，并搬运走。请选择你认为最合适的容器和最合适的姿势。
		
						</p>
						
						';
						echo '</div>';
					}
				?>	
				<div class="align_center">
				<img src="images/person.jpg" width="80%" alt="" />
				</div>
				<br>
				<?php
					if($lang=='EN'){
						echo '<div class="font_color_white font_size_20px">';
						echo 'You have 3 gestures to be chose.<br>';
						echo '</div>';
					}
					else{
						echo '<div class="font_color_white font_size_20px">';
						echo '你有三种姿势可以选择.<br>';
						echo '</div>';
					}
					
				?>
				<div class="align_center font_color_white font_size_20px">
					<table align="center">
						<tr>
							<td>A.</td>
							<td>B.</td>
							<td>C.</td>
						</tr>
						<tr>
							<td><img src="images/pose/low.png" width="60%"><br></td>
							<td><img src="images/pose/middle.png" width="70%"><br></td>
							<td><img src="images/pose/high.png" width="60%"><br></td>
						</tr>
						<tr>
							<td>
								<?php
									if($lang=='EN'){
										echo 'Lift on the hand.';
									}
									else{
										echo '拿在手上.';
									}
								?>
							</td>
							<td>
								<?php
								if($lang=='EN'){
									echo 'Hold in front of the chest.';
								}
								else{
									echo '抱在胸前.';
								}
								?>
							</td>
							<td>
								<?php
								if($lang=='EN'){
									echo 'Hold on the head.';
								}
								else{
									echo '顶在头上.';
								}
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<!---->
		
		<!-- 问卷内容 -->
		
		<div class="information">
			<?php
			for($i = 1;$i < 6;$i++){
				echo '<div class="information_grid">';
					
					if($lang == 'EN'){
						echo '<h4 id="Q',$i,'">Question.',$i,'</h4>';
					}
					else{
						echo '<h4 id="Q',$i,'">问题.',$i,'</h4>';
					}
					
					echo '
					<div class="align_center">
						<img src="questions/'.$questions[$i-1].'.png" width="80%" alt="" />
					</div>
					<br>
					';
					echo '<div class="font_color_white font_size_20px">';
					if($lang == 'EN'){
						echo 'The container you choose:<br>';
					}
					else{
						echo '你选择的容器是：<br>';
					}
					echo'
						<table width="200px">
							<tr>
								<td><input type=radio name="C',$i,'" value="1"';if($container[$i-1]==1) echo 'checked';echo'/>A. </td>
								<td><input type=radio name="C',$i,'" value="2"';if($container[$i-1]==2) echo 'checked';echo'/>B. </td>
								<td><input type=radio name="C',$i,'" value="3"';if($container[$i-1]==3) echo 'checked';echo'/>C. </td>
								<td><input type=radio name="C',$i,'" value="4"';if($container[$i-1]==4) echo 'checked';echo'/>D. </td>
							</tr>
						</table>
					';
					if($lang == 'EN'){
						echo 'The gesture you choose:<br>';
					}
					else{
						echo '你选择的姿势是：<br>';
					}
					echo '
						<table width="150px">
							<tr>
								<td><input type=radio name="p',$i,'" value="1"'; if($pose[$i-1]==1) echo 'checked'; echo'/>A. </td>
								<td><input type=radio name="p',$i,'" value="2"'; if($pose[$i-1]==2) echo 'checked'; echo'/>B. </td>
								<td><input type=radio name="p',$i,'" value="3"'; if($pose[$i-1]==3) echo 'checked'; echo'/>C. </td>
							</tr>
						</table>
					';
					echo '</div>';
				echo '</div><br>';
			}
			
			
			
			?>
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
				 <h4><?php
					if($lang=='EN'){
						echo 'Finish!';
					}
					else{
						echo '完成！';
					}
				 ?></h4>
				 <p>
					<?php
					if($lang=='EN'){
						echo 'Please fill your nickname and submit. Thank you!';
					}
					else{
						echo '请输入昵称并提交。再次感谢您的参与！';
					}
					?>
				 </p>
				 				 
				  <input type="text" name="NickName" class="text" value="<?php 
					if($lang=='EN'){
						echo 'NickName';
					}
					else{
						echo '请输入昵称';
					}
				  ?>" onFocus="this.value = '';">
				 <input type="submit" value="<?php if($lang=='EN'){echo 'Submit';} else{echo '提交';} ?>">
				 <br><br>
				 <p>
					<?php
					if($lang=='EN'){
						echo 'Click the links on the right to get more information about our works.';
					}
					else{
						echo '如果您对我们的工作感兴趣，可以点击右侧的链接浏览更多内容。';
					}
					?>
				 </p>
				 
				 <div class="clearfix"></div>
					 
			 </div>
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
</form>
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