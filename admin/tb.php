<?php
	if(isset($_POST["insert"]))
	{
		$title = $_POST["title"];
		$target_dir ="3/";
		$target_file = $target
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="tb.php" method="post" enctype="multipart/form-data">
		Nhap vao tieu de thong bao:
		<input type="file" name="image">
		<input type="submit" name="insert" value="Them moi">
	</form>
</body>
</html>