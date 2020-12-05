
<html>
<head>
	<title>Moi Coffee</title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="./images/icon.png">
	
	<link rel="stylesheet" href="css/bootstrap.css"/>
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
	.col-12{
		
		text-align: center;
		margin-top: 300px;
		margin-left: -70px;
	}
	</style>
	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
	<script type="text/javascript">
		$(document).ready(function(){
 
  // Click event of the showPassword button
  $('#showPassword').on('click', function(){
 
    // Get the password field
    var passwordField = $('#password');
 
    // Get the current type of the password field will be password or text
    var passwordFieldType = passwordField.attr('type');
 
    // Check to see if the type is a password field
    if(passwordFieldType == 'password')
    {
        // Change the password field to text
        passwordField.attr('type', 'text');
 
        // Change the Text on the show password button to Hide
        $(this).val('Hide');
    } else {
        // If the password field type is not a password field then set it to password
        passwordField.attr('type', 'password');
 
        // Change the value of the show password button to Show
        $(this).val('Show');
    }
  });
});
	</script>
</head>
<body>
<div class="container-fluid">
<!--banner-->	
	<div class="row" style="background-image: url('images/login.jpg');height: 100%;width: 100%; ">	
		<div class="col-12">
			<?php
				include("../config/config.php");
				//Khởi tạo session
				session_start();
				if(isset($_GET["task"])&& $_GET["task"]=="logout")
				{
					session_unset();
				}
				if(isset($_POST["login"]))
				{
					$us = $_POST["us"];
					$pa = $_POST["pa"];
					$sql = "select * from tbl_user where us='$us' and pa='$pa'";
					$result = mysqli_query($conn,$sql);
					if(mysqli_num_rows($result)>0)
					{
						$_SESSION["username"] = $us;
						header("location:Moicoffee.php");
						if($us=='admin')
							header("location:backend.php");
					}
					else
					{
						echo "Sai user hoặc password";
					}
				}
			?>
			<form style="margin-top: 15px;" action="login.php" id="loginForm" method="POST">
				<span style="font-size: 12px;">Tên Đăng Nhập:</span>
				<input type="text" name="us" id="username"></br>
				<span style="font-size: 12px;margin-right: 28px;">Mật Khẩu:</span>
				<input type="password" name="pa" id="password"><button style="margin-top: 20px;margin-left: -22px;" type="button" id="showPassword"><i class="fas fa-eye"></i></button></br>
				<input type="submit" name="login" value="đăng nhập" class="btn btn-primary">
				<a style="" href="#">Quên mật khẩu?</a><a style="" href="#">Đăng ký</a>
			</form>
		</div>		
	</div>		
</html>