<?php 
    include_once('db/connect.php');
?>
<?php include('include/menu.php'); ?>
    <!------------------------------- cartegory ----------------------------------------->

<?php 
    $sql_cartegory=mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC')
?>
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p>TRANG CHỦ </p>
                <p>&#8594;</p>
                <p> THIẾT BỊ PCCC </p>
                <p>&#8594;</p>
                <p> THUỐC HÀN HOÁ NHIỆT</p>
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
                

                <?php 
                        $sql_sanpham=mysqli_query($con,"SELECT * FROM tbl_cartegory,tbl_sanpham WHERE tbl_cartegory.cartegory_id=tbl_sanpham.cartegory_id AND tbl_sanpham.cartegory_id='$_GET[id]' ORDER BY tbl_sanpham.sanpham_id ASC");
                        

                ?>
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-itemm">
                        <div class="cartegory-right-top-item">
                        
                        <p>THUỐC HÀN HOÁ NHIỆT</p>
                    </div>
                    <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                    </div>
                    </div>
                    <div>
                        <div class="cartegory-right-content row">
                        <?php 
                            
                            while($row_sanpham=mysqli_fetch_array($sql_sanpham)){
        
                        ?>
                        <div class="cartegory-right-content-item">
                            <img src="<?php echo $row_sanpham['sanpham_images'] ?>" alt="">
                            <h1><?php echo $row_sanpham['sanpham_name'] ?></h1>
                            <P><?php echo $row_sanpham['sanpham_gia'] ?> <sup>đ</sup></P>
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