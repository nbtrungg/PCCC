
<?php 
session_start();
    include_once('db/connect.php');
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="css\style.css">
    <title>PCCC_Project</title>
</head>


<body>
<?php include('include/menu.php') ?>

    <!------------------------------- product ----------------------------------------->
<?php 
    if(isset($_GET['sanpham_id'])){
        $id=$_GET['sanpham_id'];
    }
    else{
        $id='';
    }
    $sql_chitiet=mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");

?>
<?php 
    
    $sql_sanpham=mysqli_query($con,"SELECT * FROM tbl_cartegory WHERE cartegory_id='$_GET[cartegory_id]'");
    $row_title=mysqli_fetch_array($sql_sanpham); 
    $sql_sp=mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id'");
    $row_titlesp=mysqli_fetch_array($sql_sp); 

?>
    <section class="product">
        <div class="container">
            <div class="product-top row">
                <p>TRANG CHỦ </p>
                <p>&#8594;</p>
                <p> THIẾT BỊ PCCC </p>
                <p>&#8594;</p>
                <p><?php echo $row_title['cartegory_name'] ?></p>
                <p>&#8594;</p>
                
                <p><?php echo $row_titlesp['sanpham_name'] ?></p>
            </div>
            <?php 
                while($row_chitiet=mysqli_fetch_array($sql_chitiet)){
            ?>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="uploads/<?php echo $row_chitiet['sanpham_images'] ?>" alt="">
                    </div>
                    <!-- <div class="product-content-left-small-img">
                        <img src="uploads/<?php echo $row_chitiet['sanpham_images'] ?>" alt="">
                        <img src="uploads/<?php echo $row_chitiet['sanpham_images'] ?>" alt="">
                        <img src="uploads/<?php echo $row_chitiet['sanpham_images'] ?>" alt="">
                        <img src="uploads/<?php echo $row_chitiet['sanpham_images'] ?>" alt="">
                    </div> -->
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $row_chitiet['sanpham_name'] ?></h1>
                        <p>MSP: <?php echo $row_chitiet['sanpham_id'] ?></p>
                    </div>
                    <div class="product-content-right-product-price">
                        <p><?php echo $row_chitiet['sanpham_gia'] ?><sup>đ</sup></p>
                    </div>
                    <div class="product-content-right-product-button row">
                        <!-- <button><i class="fas fa-shopping-basket"></i>
                            <p>THÊM VÀO GIỎ HÀNG</p></button> -->
                            <form action="cart.php" method="post">
                                <fieldset class="themgiohang">
                                <input type="hidden" name="tensp" value="<?php echo $row_chitiet["sanpham_name"] ?>">
                                <input type="hidden" name="sp_id" value="<?php echo $row_chitiet["sanpham_id"] ?>">
                                <input type="hidden" name="anhsp" value="<?php echo $row_chitiet["sanpham_images"] ?>">
                                <input type="hidden" name="soluong" value="1">
                                <input type="hidden" name="giasp" value="<?php echo $row_chitiet["sanpham_gia"] ?>">
                                <input type="submit" name="themgiohang" value="THÊM VÀO GIỎ HÀNG" class="buttonthemgiohang">

                            </fieldset>
                            </form>
                            
                    </div>
                    <div class="product-content-right-product-icon">
                        <div class="product-right-product-icon-item row">
                            <i class="fas fa-phone-alt"></i>
                            <p>Liên hệ</p>
                        </div>
                        <div class="product-right-product-icon-item row">
                            <i class="fas fa-comment"></i>
                            <p>Nhắn tin</p>
                        </div>
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            &#8744;
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                    <p>Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item baoquan">
                                    <p>Bảo quản</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <p><?php echo $row_chitiet['sanpham_chitiet'] ?></p>
                                </div>
                                <div class="product-content-right-bottom-content-baoquan">
                                    <p><?php echo $row_chitiet['sanpham_baoquan'] ?></p>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>


            </div>
        <?php } ?>
    </section>

    <!-------------------------------- footer ------------------------------------------->
<?php 
    include('include/ggmaps.php');
include('include/footer.php') ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<script type="text/javascript" src="js\script.js"></script>

</html>