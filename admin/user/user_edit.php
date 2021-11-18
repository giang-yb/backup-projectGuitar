<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../user.css">
    <link rel="stylesheet" href="../add.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384- fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
<?php
$user_id = $_GET['user_id'];
$connect = mysqli_connect('localhost','root','','qlchguitar');
$sql = "SELECT * FROM `tbl_user` where user_id=$user_id";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['sbm'])){
     $user_id = $_POST['user_id'];
     $user_name = $_POST['user_name'];
     $user_pass = $_POST['user_pass'];
     $user_phone = $_POST['user_phone'];
     $user_address = $_POST['user_address'];
     $user_cart = $_POST['user_cart'];
     $user_mode = $_POST['user_mode'];
     $sql = "UPDATE tbl_user SET user_id=$user_id,pro_id=$pro_id,user_pass=$user_pass,user_phone=$user_phone,user_address=$user_address,user_mode=$user_mode,user_cart=$user_cart WHERE user_id = '$user_id'";
    //  if(mysqli_query($connect,$sql)){
    //     $message = "Sửa thành công";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    //  }
    $query = mysqli_query($connect,$sql);
    header('location:user.php?page_layout=show');
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
                    <a href="../../product.php">SẢN PHẨM</a>
                </div>
                <div class="nav-item">
                    <a href="../user.php">TÀI KHOẢN</a>
                </div>
                <div class="nav-item">
                    <a href="../../cart.php">GIỎ HÀNG</a>
                </div>
            </div>
        </div>
        <div class="display-data">
            <div class="title">
                <span>SỬA SẢN PHẨM</span>
            </div>
            <div class="add">
                <form action="" method="POST">
                
                    <label for="fname">Mã Tài Khoản</label>
                    <input type="text" id="fname" name="user_id" placeholder="Mã tài khoản" require value="<?php echo $row['user_id']; ?>">

                    <label for="fname">Tên Tài Khoản</label>
                    <input type="text" id="fname" name="pro_id" placeholder="Tên sản phẩm" readonly required value="<?php echo $row['user_name']; ?>">

                    <label for="lname">Mật Khẩu</label>
                    <input type="text" id="lname" name="user_pass" placeholder="Mật khẩu" required value="<?php echo $row['user_pass']; ?>">

                    <label for="lname">Số điện thoại</label>
                    <input type="number" id="lname" name="user_phone" placeholder="Số điện thoại" required value="<?php echo $row['user_phone']; ?>">

                    <label for="lname">Địa Chỉ</label>
                    <input type="text" id="lname" name="user_address" placeholder="Địa Chỉ" required value="<?php echo $row['user_address']; ?>">

                    <label for="lname">Trạng Thái</label>
                    <input type="text" id="lname" name="user_mode" placeholder="Trạng Thái" required value="<?php echo $row['user_mode']; ?>">

                    <label for="lname">Mô Tả</label>
                    <input type="text" id="lname" name="user_cart" placeholder="Mô Tả" required value="<?php echo $row['user_cart']; ?>">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="user.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>