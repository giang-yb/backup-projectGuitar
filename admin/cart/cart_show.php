
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../product.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384- fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <?php
        session_start();
        include'../../db.php';
        $search = isset($_GET['ten']) ? $_GET['ten'] : "";
        if($search){
        $where = "WHERE 'user_id' LIKE '%".$search."% OR 'pro_id' LIKE  '%".$search."%' ";
        }
        $item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
        $current_page = !empty($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($current_page-1) * $item_per_page;
        if($search){
        $sql = "SELECT * FROM `tbl_cartinf` WHERE `user_id` LIKE '%".$search."%' OR `pro_id` LIMIT ".$item_per_page." OFFSET ".$offset;
        $totalRecords = mysqli_query($connect, "SELECT * FROM `tbl_cartinf` WHERE `user_id` LIKE '%".$search."%' OR `pro_id` LIKE '%".$search."%' ");
        }else{
        $sql = "SELECT * FROM tbl_cartinf LIMIT ".$item_per_page." OFFSET ".$offset;
        $totalRecords = mysqli_query($connect, "SELECT * FROM `tbl_cartinf`");
        }
        $totalRecords = $totalRecords->num_rows;
        $totalRecords = ceil($totalRecords / $item_per_page);
        $query = mysqli_query($connect, $sql);
        // $sql = "SELECT * FROM `tbl_product`";
        // $query = mysqli_query($connect, $sql);
        if(empty($_SESSION['current_user'])){
            ?>
            Chua dang nhap , dang nhap tai 
            <a href="../login.php">Tai day</a> 
            <?php } else {
                $currentUser = $_SESSION['current_user'];
                ?> 
                <header>
        <div class="cnt">
            <div class="logo">
                <span>Guitar Station</span>
            </div>
            <div class="in-out">
                <div class="name">
                    <p><?= $currentUser['user_name'] ?></p>
                </div>
                <button><a href="../../logout.php">Đăng xuất</a></button>
            </div>
        </div>
    </header>
    <div class="main">
            <div class="nav-small">
                <div class="nav-small_left">
                    <div class="nav-item">
                    <a href="../menu/menu.php">DANH MỤC</a>
                    </div>
                    <div class="nav-item">
                        <a href="../product/product.php">SẢN PHẨM</a>
                    </div>
                    <div class="nav-item">
                        <a href="../user/user.php">TÀI KHOẢN</a>
                    </div>
                    <div class="nav-item">
                        <a href="cart.php">GIỎ HÀNG</a>
                    </div>
                </div>
            </div>
            <div class="display-data">
                <div class="action">
                    <form action="" method="GET">
                    <input type="text" placeholder="Nhập sản phẩm cần tìm kiếm tại đây" value="<?= isset($_GET['ten']) ? $_GET['ten'] : ""?>" name="ten" />
                    <input type="submit"class="btn btn-secondary" value="Tìm kiếm sản phẩm">
                    <a class="btn btn-primary" href="cart.php?page_layout=add">Thêm mới</a>
                     <a href="cart.php?page_layout=show" class="btn btn-primary"><i class="fa fa-refresh"></i>Tải lại</a>
                    </form>
                </div>
                <div class="table-cart_left">
                    <table>
                        <tr>
                            <th>MÃ SẢN PHẨM</th>
                            <th>MÃ NGƯỜI DÙNG</th>
                            <th>THAO TÁC</th>
                        </tr>

                        <!-- =================================== -->
                        <?php while($row = mysqli_fetch_assoc($query)): ?>
                        <tr>
                            <td>
                                <div class="cate_id">
                                <?php echo $row['pro_id'] ?>
                                </div>
                            </td>
                            <td>
                                <div class="pro_id">
                                <?php echo $row['user_id'] ?>
                                </div>
                            </td>
                            <td>
                            <td><a type="button" href="cart.php?page_layout=edit&cart_id=<?php echo $row['cart_id'];?>">Edit</a></td>
                            <td><a type="button" href="cart.php?page_layout=delete&cart_id=<?php echo $row['cart_id'];?>">Delete</a></td>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                        </table>
                        <?php
                include '../pagination.php';
            ?>
    <?php } 
    ?>
</body>

</html>