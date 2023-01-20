<?php 
session_start();
    include_once('db/connect.php');
?>
<?php
    if(isset($_POST['search_button'])){

    $tukhoa = $_POST['search_product'];
    
        
    $sql_product = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_name LIKE '%$tukhoa%' ORDER BY sanpham_id DESC");     

    $title = $tukhoa;
    }       
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
<?php include('include/menu.php'); ?>
    <!------------------------------- cartegory ----------------------------------------->

<?php 
    $sql_cartegory=mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC')
?>
<?php 
    $sql_sanpham=mysqli_query($con,"SELECT * FROM tbl_cartegory,tbl_sanpham WHERE tbl_cartegory.cartegory_id=tbl_sanpham.cartegory_id ORDER BY tbl_sanpham.sanpham_id DESC");             

?>
<?php 
    $sql_sanphamm=mysqli_query($con,"SELECT * FROM tbl_cartegory,tbl_sanpham WHERE tbl_cartegory.cartegory_id=tbl_sanpham.cartegory_id ORDER BY tbl_sanpham.sanpham_id DESC");
    $row_title=mysqli_fetch_array($sql_sanphamm);                

?>
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p>TRANG CHỦ </p>
                <p>&#8594;</p>
                <p> TÌM KIẾM </p>
                <p>&#8594;</p>
                <p> <?php echo $title ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">
                    <ul>
                        <li class="cartegory-left-li"><a href="#">THIẾT BỊ PCCC</a>
                            <ul>
                               <?php 
                        while ($row_cartegory=mysqli_fetch_array($sql_cartegory)) {
                            
                    ?>
                    <li><a href="cartegory.php?id=<?php echo $row_cartegory['cartegory_id'] ?>"><?php echo $row_cartegory['cartegory_name'] ?></a> </li>
                    <?php 
                        }
                    ?>
                            </ul>
                        </li>
                        <li class="cartegory-left-li"><a href="">TIN TỨC PCCC</a></li>
                        <li class="cartegory-left-li"><a href="">THIẾT KẾ HỆ THỐNG PCCC</a></li>
                        <li class="cartegory-left-li"><a href="">LIÊN HỆ</a></li>
                    </ul>
                </div>
                

                
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-itemm">
                        <div class="cartegory-right-top-item">
                        
                        <p> KẾT QUẢ TÌM KIẾM CHO TỪ KHOÁ: <?php echo $title ?></p>
                    </div>
                   <!--  <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div> -->
                    </div>
                    <div class="cartegory-right-content-container">
                        <div class="cartegory-right-content row">
                        <?php 
                            
                            while($row_sanpham=mysqli_fetch_array($sql_product)){
        
                        ?>
                        <div class="cartegory-right-content-item">
                            <a href="product.php?cartegory_id=<?php echo $row_title['cartegory_id'] ?>&sanpham_id=<?php echo $row_sanpham['sanpham_id'] ?>"><img src="uploads/<?php echo $row_sanpham['sanpham_images'] ?>" alt=""></a>
                            <h1><?php echo $row_sanpham['sanpham_name'] ?></h1>
                            <P class="cartegory_gia"><?php echo $row_sanpham['sanpham_gia'] ?> <sup>đ</sup></P>
                        </div>
                        <?php 
                            }
                        ?>
                    </div>
                    <div class="cartegory-right-bottom row">
                        <div class="cartegory-right-bottom-items">
                            <p>Hiện thị 2<span>|</span>4 sån phẩm</p>
                        </div>
                        <div class="cartegory-right-bottom-items">
                            <p><span>&#171;</span>1 2 3 4 5<span>&#187;</span>Trang cuối</p>
                        </div>
                    </div>
                    </div>
                    
                    
                </div>
                
            </div>
        </div>
    </section>
    <!-------------------------------- footer ------------------------------------------->
<?php
    include('include/ggmaps.php');
 include('include/footer.php'); ?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
<script type="text/javascript" src="js\script.js"></script>

</html>