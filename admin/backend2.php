<?php
	// Create connection
	$conn = mysqli_connect("localhost", "root", "", "moicoffee");
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}
	if(isset($_POST["insert"]))
	{
		$title = $_POST["title"];
		$target_dir = "upload/";
		$gia=$_POST["gia"];
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
		{
			$sql = "INSERT INTO tbl_tb (Title,Image,Gia) VALUES (N'$title', '$target_file', '$gia')";

			if (mysqli_query($conn, $sql)) {
			  echo "New record created successfully";
			} else {
			  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}

		} 
		else 
		{
			echo "Sorry, there was an error uploading your file.";
		}
	}
?>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
</head>
<body>
	<h1 style="text-align:center">Trang quản trị sản phẩm</h1>
	<a style="color: black;margin-left: 1200px;font-size: 18px;" href="backend.php">Quay Lại</a>
	<form action="backend2.php" method="post" enctype="multipart/form-data">
		Nhập vào tiêu đề thông báo:
		Nội dung:
			<textarea name="title"></textarea>
                <script>
                        CKEDITOR.replace( 'title' );
                </script>
		Chọn hình ảnh:
		<input type="file" name="image">
		Nhập giá:
		<input type="text" name="gia">
		<input type="submit" name="insert" value="thêm mới">
	</form>
</body>	
</html>