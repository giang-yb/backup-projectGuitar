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
$pro_id = $_GET['pro_id'];
$connect = mysqli_connect('localhost','root','','qlchguitar');
$sql = "SELECT * FROM `tbl_cart` where pro_id=$pro_id";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['sbm'])){
     $user_id = $_POST['user_id'];
     $pro_id = $_POST['pro_id'];
     $sql = "UPDATE tbl_cart SET user_id=$user_id,pro_id=$pro_id WHERE pro_id = '$pro_id'";
    //  if(mysqli_query($connect,$sql)){
    //     $message = "Sửa thành công";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    //  }
    $query = mysqli_query($connect,$sql);
    header('location:cart.php?page_layout=show');
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
                    <a href="../../user.php">USER</a>
                </div>
                <div class="nav-item">
                    <a href="cart.php">DIFFERENT</a>
                </div>
            </div>
        </div>
        <div class="display-data">
            <div class="title">
                <span>SỬA SẢN PHẨM</span>
            </div>
            <div class="add">
                <form action="" method="POST">
                
                    <label for="fname">Mã Sản Phẩm</label>
                    <input type="text" id="fname" name="cate_id" placeholder="Mã sản phẩm" require value="<?php echo $row['pro_id']; ?>">

                    <label for="fname">Mã Người Dùng</label>
                    <input type="text" id="fname" name="pro_id" placeholder="Mã người dùng" readonly required value="<?php echo $row['user_id']; ?>">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="cart.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>