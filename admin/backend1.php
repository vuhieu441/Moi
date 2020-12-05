<?php
    require("../config/config.php");
    /*session_start();
    if(!$_SESSION["username"])
    {
        header("location:login.php");
    }
    else
    {
        echo "Xin chao ".$_SESSION["username"];
        echo "<a class='btn btn-danger' href='login.php?task=logout'>LOG OUT</a>";
    }*/
    //thêm mới dữ liệuj
    //kiểm tra xem người dùng đã nhấn nút thêm mới chưa
    if(isset($_POST["insert"]))
    {
        $Ten_TD = $_POST["Ten_TD"];
        //khai báo biến thực hiện câu truy vấn sql insert data
        $sql_insert = "insert into tbl_thucdon(Ten_TD,Trang_Thai) values(N'".$_POST["Ten_TD"]."',1)";
        //kiểm tra insert thành công hay không
        if(mysqli_query($conn,$sql_insert))
        {
            echo "thêm mới dữ liệu thành công";
            //điều hướng trang web tránh insert lặp dữ liệu sau khi nhấn f59
            header("Location:backend1.php");
        }
        else
        {
            echo "thêm mới dữ liệu thất bại" . mysqli_error($conn);
        }
    }
    //delete ban tin trong csdl
    //kiem tra xem ng dung da nhan nut delete chua
    if(isset($_GET["task"]) && $_GET["task"]=="delete")
    {
        //khai bao bien sql de delete du lieu
        $sql_delete = "delete from tbl_thucdon where id = ". $_GET["id"];
        //kiem tra xem thanh cong khong
        if(mysqli_query($conn,$sql_delete))
        {
            echo "xoa du lieu thanh cong";

        }
        else
        {
            echo "xoa that bai" . mysql_error($conn);
        }
    }
    //cap nhat
    if(isset($_POST["btn_update"]))
    {
        $sql_update = "update tbl_thucdon set Ten_TD = N'".$_POST["update"]."' where id=".$_POST["id"];
        if(mysqli_query($conn,$sql_update))
            echo "cap nhat thanh cong";
        else
            echo "cap nhat that bai" . mysqli_error($conn);    
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    </head>
    <body>
        <div class="container">
            <h1 style="text-align:center">Trang quản trị danh mục</h1>
            <a style="color: black;margin-left: 900px;font-size: 18px;" href="backend.php">Quay Lại</a>
            <!--phần insert dữ liệu-->
            <div class="row">
                <form action="backend1.php" method="post">
                    <input type="text" name="Ten_TD">
                    <input type="submit" name="insert" value="Thêm mới">
                </form>
            </div>

            <!--hiển thị và thao tác với dữ liệu-->
            <div class="row">
                <table class="table">
                    <!--khởi tạo dòng tiêu đề bảng-->
                    <tr>
                        <th>id</th>
                        <th>Tên danh mục</th>
                        <th>Trạng Thái</th>
                        <th>Thao tác</th>
                    </tr>
                    <!--hiển thị nội dung dữ liệu của bảng-->
                    <?php
                        //khởi tạo biến lưu chuỗi truy vấn dữ liệu
                        $sql_select = "select * from tbl_thucdon order by id DESC";
                        //đổ dữ liệu sau khi truy vấn vào biến kết quả
                        $ketqua = mysqli_query($conn,$sql_select);
                        //kiểm tra xem kết quả có dữ liệu hay không
                        if(mysqli_num_rows($ketqua)>0)
                        {
                            while ($row = mysqli_fetch_assoc($ketqua))
                            {
                                echo "<tr>";
                                echo "<td>".$row["id"]."</td>";
                                if(isset($_GET["t"]) && $_GET["t"]=="update")
                                {
                                    if($_GET["id"] == $row["id"])
                                    {   
                                        echo "<form action='backend1.php' method='post'><td>";
                                        echo "<input type='text' name='update' value='".$row["Ten_TD"]."'>";
                                        echo "</td>";
                                        echo "<input type='hidden' name='id' value='".$row["id"]."'>";
                                        echo "<td>".$row["Trang_Thai"]."</td>";
                                        echo "<td>";
                                        echo "<input type='submit' name='btn_update' value='cap nhat' calss='btn btn-primary'>";
                                        echo "</td></form>";
                                    } 
                                    else
                                    {
                                        echo "<td>".$row["Ten_TD"]."</td>";
                                        echo "<td>".$row["Trang_Thai"]."</td>";
                                        echo "<td>";
                                        echo "<a href='backend1.php?t=update&id=".$row["id"]."' class='btn btn-warning'>Cập nhật</a>";
                                        echo "<a href='backend1.php?task=delete&id=".$row["id"]."' class='btn btn-danger'>Xoá</a>";
                                        echo "</td>";
                                    }   
                                }
                                else
                                {
                                    echo "<td>".$row["Ten_TD"]."</td>";
                                    echo "<td>".$row["Trang_Thai"]."</td>";
                                    echo "<td>";
                                    echo "<a href='backend1.php?t=update&id=".$row["id"]."' class='btn btn-warning'>Cập nhật</a>";
                                    echo "<a href='backend1.php?task=delete&id=".$row["id"]."' class='btn btn-danger'>Xoá</a>";
                                    echo "</td>";
                                }
                               
                            }
                        }
                        else
                        {
                            echo "bảng không chứa dữ liệu";
                        }

                    ?>
                    <!--<tr>
                        <td>1</td>
                        <td>Tin tức</td>
                        <td>1</td>
                        <td>
                            <a href="#" class="btn btn-warning">Cập nhật</a>
                            <a href="#" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Thông báo</td>
                        <td>1</td>
                        <td>
                            <a href="#" class="btn btn-warning">Cập nhật</a>
                            <a href="#" class="btn btn-danger">Xoá</a>
                        </td>
                    </tr>-->
                </table>
            </div>
        </div>
    </body>
</html>