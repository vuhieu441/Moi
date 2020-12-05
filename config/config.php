<?php
//khai báo các tham số kết nối với MYSQL
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "moicoffee";//tham so ket noi đến database
//khởi tạo biến kết nối đến cơ sở dữ liệu
	$conn = mysqli_connect($servername,$username,$password,$db);
//kiểm tra kết nối
	if(!$conn)
	{
		echo "Lỗi kết nối cơ sở dữ liệu " . mysql_connect_error();
	}
	else
	{
		echo "";
	}	
?>
