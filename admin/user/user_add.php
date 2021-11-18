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
$sql = "SELECT * FROM tbl_user";
$query = mysqli_query($connect,$sql);

if(isset($_POST['sbm'])){
     $user_id = $_POST['user_id'];
     $user_name = $_POST['user_name'];
     $user_pass = $_POST['user_pass'];
     $user_phone = $_POST['user_phone'];
     $user_address = $_POST['user_address'];
     $user_email = $_POST['user_email'];
     $user_cart = $_POST['user_cart'];
     $user_mode = $_POST['user_mode'];
     $sql = "INSERT INTO `tbl_user`(`user_id`, `user_name`, `user_pass`, `user_phone`, `user_address`,`user_cart`, `user_email`) VALUES ('$user_id','$user_name','$user_pass','$user_phone','$user_address','$user_cart','$user_email')";
     //$query = mysqli_query($connect,$sql);
     if($user_name!=""){
        if(mysqli_query($connect,$sql)){
            $message = "Thêm thành công";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }else {
            $message = "Mã tài khoản bị trùng";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } else {
        $message = "Mã tài khoản bị bỏ trống";
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
                    <a href="../../menu.php">DANH MỤC</a>
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
                <span>THÊM SẢN PHẨM MỚI</span>
            </div>
            <div class="add">
                <form action="" method="POST">
                
                    <label for="fname">Mã Tài Khoản</label>
                    <input type="text" id="fname" name="user_id" placeholder="Mã Tài Khoản">

                    <label for="fname">Tên Tài Khoản</label>
                    <input type="text" id="fname" name="user_name" placeholder="Mã sản phẩm">

                    <label for="lname">Mật Khẩu</label>
                    <input type="text" id="lname" name="user_pass" placeholder="Mật Khẩu">

                    <label for="lname">Số Điện Thoại</label>
                    <input type="number" id="lname" name="user_phone" placeholder="Số Điện Thoại">

                    <label for="lname">Địa Chỉ</label>
                    <input type="text" id="lname" name="user_address" placeholder="Địa Chỉ">

                    <label for="lname">Mô Tả</label>
                    <input type="text" id="lname" name="user_email" placeholder="Mô Tả">

                    <label for="lname">Giỏ hàng</label>
                    <input type="text" id="lname" name="user_cart" placeholder="Giỏ hàng">

                    <label for="lname">Trạng thái</label>
                    <input type="text" id="lname" name="user_mode" placeholder="Trạng thái">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="user.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>