<!DOCTYPE html>
<html>
<html lang="vi-VN">

<head>
	<title>Moi Coffee</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="./images/icon.png">
	
	<link rel="stylesheet" href="css/bootstrap.css"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<meta name="viewport" content="width=device-width ,  initial-scale=1.0">
	<style type="text/css">
		*{
	margin: 0px;
	padding: 0px;
	list-style: none;
	text-decoration: none;
	box-sizing: border-box;
}
.row .welcome{
	width: 100%;
}
.vn h1{
	margin-left: 5px;
	padding-top: 110px;
}
.col-1 h1 a{
	display: block;
	width: 33px;
	height: 20px;
}
.col-1 h1 a:hover{
	font-size: 20px;
}
.en h1{
	margin-left: -80px;
	padding-top: 110px;
}
.col-10{
	background-color: #8B4513;
	height: 65px;
}
.col-10 ul{
	text-align: center;
	background-color: #8B4513;
}
.col-10 ul li{
	display: inline-block;
	width: 200px;
	height: 50px;
	line-height: 50px;
	margin-left: -5px;
	position: relative;
}
.col-10 ul li a{
	text-decoration: none;
	font-weight: bold;
	color: white;
	display: block;
	padding: 7px 20px 7px 20px;
}
.col-10 ul li a:hover{
	background-color: #330000;
}
.sub-menu{
	display: none;
	position: absolute;
	z-index: 10000;
}
.col-10 ul li:hover .sub-menu{
	display: block;
}
.col-2 form input{
	border-radius: 5px;
}
.col-2 form{
	margin-top: 5px;
}
.carousel{
	margin-top: 30px;
}
.menu_item{
	background: transparent;
}
.menu_item_image{
	position: relative;
	text-decoration: none;
}
.menu_item_info{
	padding: 12px 0 0;
}
.gia{
	font-size: 24px;
	font-family: 'BebasNeue','Lato',"Time new roman", serif;
	font-weight:700;
	color: #EA8025;
	margin-bottom: 10px;
}
.buy_now{
	font-size: 16px;
	font-weight:700;
	color: #fff;
	display: inline-block;
	font-family: 'BebasNeue','Lato',"Time new roman", serif;
	background: transparent;
	vertical-align: middle;
	border: 2px solid #EA8025;
	padding: 6px 15px;
	text-decoration: none;
}
.row .col{
	font-family: Helvetica;
	font-weight: bold;
	font-size: 20px;
	font-weight: 700;
	margin-top: 50px;
	margin-left: 30px;
	border: 3px solid orange;
	margin-right:1230px;
	background-color: orange;
	padding:5px;
	color:white;
}
.row .col a{
	text-decoration: none;
	color:  #263238;
}
.row .col a:hover{
	color: black;
}	
a{
	text-decoration: none;
	color: #191919;
	font-weight: bold;
	text-transform: uppercase;
}
.view_more{
	font-size: 16px;
	font-weight:700;
	color: #EA8025;
	font-family: 'BebasNeue','Lato',"Time new roman", serif;
	background: transparent;
	vertical-align: middle;
	border: 2px solid #EA8025;
	margin-left: 15px;
	position: relative;
	padding: 6px 15px;
	transition: .3s;
	overflow: hidden;
	text-decoration: none;
}
.menu_item a:hover{
	text-decoration: none;
}
.row marquee{
	margin-left:30px;
	margin-right:30px;
}
.col-3{
	margin-top: 80px;
}
.col-3 h3{
	color: white;
	padding-left: 30px;
}
.col-3 ul{
	padding-left: 30px;
}
.col-3 ul li a i{
	color: white;
}
.col-3 ul li{
	display: inline;
	margin-right: 10px;
	font-size: 30px;
}
.col-3 ul li a:hover{
	font-size: 45px;
}
.col-7{
	margin-left: -60px;
}
.col-7 p{
	text-align: center;
	margin-top: 170px;
	color: white;
	border-top: 1px solid white;
	font-size: 15px;
}
.col-2 div{
	margin-top: 55px;
}
.col-2 p{
	color: white;
	text-align: right;
	margin-right: -30px;
}


	</style>
</head>

<body>
<div class="container-fluid">
<!--banner-->	
	<div class="row" style="background-image: url('images/welcome.jpeg');height: 160px;">	
		<div class="col-4"></div>
		<div class="col-2"></div>
		<div class="col-2"></div>
		<div class="col-2">
			<?php
			    require("../config/config.php");
			    session_start();
			    if(!$_SESSION["username"])
			    {
			        header("location:login.php");
			    }
			    else
			    {
			      	
			        echo "<a style='margin-top: 100px;margin-left: 120px;;' class='btn btn-danger' href='login.php?task=logout'>LOG OUT</a>";
			    }
			 ?>   
		</div>
		<div class="col-1 vn">
			<h1><a href="#"><img src="./images/flag-vn.jpg"></a></h1>	
		</div>
		<div class="col-1 en">
			<h1><a href="#"><img src="./images/flag-en.jpg"></a></h1>		
		</div>
	</div>	
<!--menu-->	
	<div class="row" style="background-color: #8B4513;margin-bottom: 40px;">
		<div class="col-10">	
			<?php 
				$spl="select * from tbl_thucdon";
				$recordset = mysqli_query($conn, $spl);
			?>
			<ul>
				<li><a href="Moicoffee.php">TRANG CHỦ</a></li>
				<li><a href="aboutme.php">VỀ CHÚNG TÔI</a></li>
				<li><a href="#">THỰC ĐƠN</a>
						
					<ul class="sub-menu">
						<?php
							
							while($row = mysqli_fetch_array($recordset)){
								?>
									<li><a href="<?php echo $row['Ten_TD'].".php";?>"><?php echo $row['Ten_TD'];?></a></li>
								<?php
							}
						?>
						
					</ul>
				</li>
				<li><a href="special.php">ĐẶC BIỆT</a></li>
				<li><a href="event.php">SỰ KIỆN</a></li>
				<li><a href="#">LIÊN HỆ</a>
					<ul class="sub-menu">
						<li><a href="https://www.facebook.com/moi12122000">Facebook</a></li>
						<li><a href="#">Gmail</a></li>
					</ul>
				</li>
			</ul>	
		</div>		
		<div class="col-2" >
			<form action="search.php" method="post">
				<input type="text" name="title">
				<input type="submit" name="search" value="Tìm Kiếm">
			</form>
		</div>
	</div>
</div>
</body>
</html>