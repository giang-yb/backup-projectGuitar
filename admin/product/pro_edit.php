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
$sql = "SELECT * FROM `tbl_product` where pro_id=$pro_id";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['sbm'])){
     $cate_id = $_POST['cate_id'];
     $pro_id = $_POST['pro_id'];
     $pro_name = $_POST['pro_name'];
     $pro_price = $_POST['pro_price'];
     $pro_rate = $_POST['pro_rate'];
     $pro_des = $_POST['pro_des'];
     $pro_img = $_POST['pro_img'];
     $pro_status = $_POST['pro_status'];
     $pro_band = $_POST['pro_band'];
     $sql = "UPDATE tbl_product SET cate_id=$cate_id,pro_id=$pro_id,pro_name=$pro_name,pro_price=$pro_price,pro_rate=$pro_rate,pro_status=$pro_status,pro_img=$pro_img,pro_band=$pro_band,pro_des=$pro_des WHERE pro_id = '$pro_id'";
    //  if(mysqli_query($connect,$sql)){
    //     $message = "Sửa thành công";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    //  }
    $query = mysqli_query($connect,$sql);
    header('location:product.php?page_layout=show');
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
                    <a href="product.php">SẢN PHẨM</a>
                </div>
                <div class="nav-item">
                    <a href="../../user.php">TÀI KHOẢN</a>
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
                
                    <label for="fname">Mã Danh Mục</label>
                    <input type="text" id="fname" name="cate_id" placeholder="Mã danh mục" require value="<?php echo $row['cate_id']; ?>">

                    <label for="fname">Mã Sản Pẩm</label>
                    <input type="text" id="fname" name="pro_id" placeholder="Mã sản phẩm" readonly required value="<?php echo $row['pro_id']; ?>">

                    <label for="lname">Tên Sản Phẩm</label>
                    <input type="text" id="lname" name="pro_name" placeholder="Tên sản phẩm" required value="<?php echo $row['pro_name']; ?>">

                    <label for="lname">Giá Tiền</label>
                    <input type="number" id="lname" name="pro_price" placeholder="Giá Tiền" required value="<?php echo $row['pro_price']; ?>">

                    <label for="lname">Đánh Giá</label>
                    <input type="text" id="lname" name="pro_rate" placeholder="Đánh Giá" required value="<?php echo $row['pro_rate']; ?>">

                    <label for="lname">Trạng Thái</label>
                    <input type="text" id="lname" name="pro_status" placeholder="Trạng Thái" required value="<?php echo $row['pro_status']; ?>">

                    <label for="lname">Hình Ảnh</label>
                    <input type="text" id="lname" name="pro_img" placeholder="Hình Ảnh" required value="<?php echo $row['pro_img']; ?>">

                    <label for="lname">Nhãn Hàng</label>
                    <input type="text" id="lname" name="pro_band" placeholder="Nhãn Hàng" required value="<?php echo $row['pro_band']; ?>">

                    <label for="lname">Mô Tả</label>
                    <input type="text" id="lname" name="pro_des" placeholder="Mô Tả" required value="<?php echo $row['pro_des']; ?>">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="product.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>