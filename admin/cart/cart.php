<?php
    require_once('../../db.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'show':
                    require_once './cart_show.php';
                    break;
                case 'add':
                    require_once './cart_add.php';
                    break;
                case 'edit':
                    require_once './cart_edit.php';
                    break;
                case 'delete':
                    require_once './cart_delete.php';
                    break;   
                
                default:
                    require_once './cart_show.php';
                    break;
            }
        } else {
            require_once './cart_show.php';
        }   

    ?>
</body>
</html>