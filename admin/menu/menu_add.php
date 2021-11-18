<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../product.css">
    <link rel="stylesheet" href="../add.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384- fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php

$connect = mysqli_connect('localhost','root','','qlchguitar');
$sql = "SELECT * FROM tbl_menu";
$query = mysqli_query($connect,$sql);

if(isset($_POST['sbm'])){
     $menu_id = $_POST['menu_id'];
     $menu_name = $_POST['menu_name'];
     $sql = "INSERT INTO `tbl_menu`(`menu_id`, `menu_name`) VALUES ('$menu_id','$menu_name')";
     //$query = mysqli_query($connect,$sql);
     if($menu_id!=""){
        if(mysqli_query($connect,$sql)){
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else {
            $message = "Mã hàng bị trùng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } else {
        $message = "Mã hàng bị bỏ trống";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
}
?>
    <header>
        <div class="cnt">
            <div class="logo">
                <span>Guitar Station</span>
            </div>
            <div class="in-out">
                <div class="name">
                    <p> Admin </p>
                </div>
                <button>Login / Logout</button>
            </div>
        </div>
    </header>
    <div class="main">
        <div class="nav-small">
            <div class="nav-small_left">
                <div class="nav-item">
                    <a href="menu.php">DANH MỤC</a>
                </div>
                <div class="nav-item">
                    <a href="../product/product.php">SẢN PHẨM</a>
                </div>
                <div class="nav-item">
                    <a href="../user/user.php">TÀI KHOẢN</a>
                </div>
                <div class="nav-item">
                    <a href="../cart/cart.php">GIỎ HÀNG</a>
                </div>
            </div>
        </div>
        <div class="display-data">
            <div class="title">
                <span>THÊM DANH MỤC MỚI</span>
            </div>
            <div class="add">
                <form action="" method="POST">
                
                    <label for="fname">Mã Danh Mục</label>
                    <input type="text" id="fname" name="menu_id" placeholder="Mã danh mục">

                    <label for="fname">Tên Danh Mục</label>
                    <input type="text" id="fname" name="menu_name" placeholder="Tên danh mục">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="menu.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>