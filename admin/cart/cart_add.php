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
$sql = "SELECT * FROM tbl_cart";
$query = mysqli_query($connect,$sql);

if(isset($_POST['sbm'])){
     $user_id = $_POST['user_id'];
     $pro_id = $_POST['pro_id'];
     $sql = "INSERT INTO `tbl_cart`(`user_id`, `pro_id`) VALUES ('$user_id','$pro_id')";
     //$query = mysqli_query($connect,$sql);
     if($pro_id!=""){
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
                    <a href="../../menu.php">MENU</a>
                </div>
                <div class="nav-item">
                    <a href="../../product.php">PRODUCT</a>
                </div>
                <div class="nav-item">
                    <a href="../../user.php">USER</a>
                </div>
                <div class="nav-item">
                    <a href="cart.php">DIFFERENT</a>
                </div>
            </div>
        </div>
        <div class="display-data">
            <div class="title">
                <span>THÊM SẢN PHẨM MỚI</span>
            </div>
            <div class="add">
                <form action="" method="POST">
                
                    <label for="fname">Mã Người Dùng</label>
                    <input type="text" id="fname" name="user_id" placeholder="Mã người dùng">

                    <label for="fname">Mã Sản Phẩm</label>
                    <input type="text" id="fname" name="pro_id" placeholder="Mã sản phẩm">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="cart.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>