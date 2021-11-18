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
$menu_id = $_GET['menu_id'];
$connect = mysqli_connect('localhost','root','','qlchguitar');
$sql = "SELECT * FROM `tbl_menu` where menu_id=$menu_id";
$query = mysqli_query($connect,$sql);
$row = mysqli_fetch_assoc($query);

if(isset($_POST['sbm'])){
     $menu_id = $_POST['menu_id'];
     $menu_name = $_POST['menu_name'];
     $sql = "UPDATE tbl_menu SET menu_id=$menu_id,menu_name=$menu_name WHERE menu_id = '$menu_id'";
    //  if(mysqli_query($connect,$sql)){
    //     $message = "Sửa thành công";
    //     echo "<script type='text/javascript'>alert('$message');</script>";
    //  }
    $query = mysqli_query($connect,$sql);
    header('location:menu.php?page_layout=show');
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
                    <a href="../menu.php">DANH MỤC</a>
                </div>
                <div class="nav-item">
                    <a href="../product/product.php">SẢN PHẨM</a>
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
                <span>SỬA DANH MỤC</span>
            </div>
            <div class="add">
                <form action="" method="POST">
                
                    <label for="fname">Mã Danh Mục</label>
                    <input type="text" id="fname" name="menu_id" placeholder="Mã danh mục" readonly require value="<?php echo $row['menu_id']; ?>">

                    <label for="fname">Tên Danh Mục</label>
                    <input type="text" id="fname" name="menu_name" placeholder="Tên sản phẩm"  required value="<?php echo $row['menu_name']; ?>">

                    <button type="submit" name="sbm"> LƯU </button>
                    <button><a href="menu.php?page_layout=show">Thoát</a></button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>