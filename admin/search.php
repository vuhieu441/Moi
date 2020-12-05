<?php
	require ('banner.php');
?>
<html>
	<div class="container-fluid">
		<?php
			// Create connection
			$conn = mysqli_connect("localhost", "root", "", "moicoffee");
			// Check connection
			if (!$conn) {
			  die("Connection failed: " . mysqli_connect_error());
			}
			$sql = "";
			if(isset($_POST["search"]))
			{
				$title = $_POST["title"];
				$sql = "SELECT * FROM tbl_tb WHERE Title LIKE '%$title%'";
			}
			else
			{
				$sql = "SELECT * FROM tbl_tb";
			}
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
			  // output data of each row
			  while($row = mysqli_fetch_assoc($result)) {
				echo "
				<div style='display: inline-block;'>
					<div class='card' style='width: 18rem;''>
                    	<img class='card-img-top' style='width:250px; height:180px;' src='".$row["Image"]."'>
                    	<div class='card-body'>
                        	<h5 class='card-title'>".$row["Title"]."</h5>
                        	<p class='card-text' style='color: red;''>".$row["Gia"]."VND</p>
                        	<a href='#'' class='btn btn-primary'>Đặt hàng ngay</a>
                    	</div>
                	</div>
                </div>";
				/*echo "<img style='width:250px; height:180px;' src='".$row["Image"]."'>";
				echo "<h5 style>".$row["Title"]."</h5>";
				echo "<h5>".$row["Gia"]."</h5><hr/>";*/
			  }
			} else {
			  echo "Không tìm thấy kết quả :((";
			}
		?>
		<?php
			require ('footer.php');
		?>
	</div>	
</html>