<?php 
session_start();
    include_once('db/connect.php');
?>
<?php 
if(isset($_POST['themgiohang'])){
    $tensanpham=$_POST['tensp'];
    $sanpham_id=$_POST['sp_id'];
    $hinhanh=$_POST['anhsp'];
    $soluong=$_POST['soluong'];
    $gia=$_POST['giasp'];
    $sql_select_giohang=mysqli_query($con,"SELECT * FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
    $count=mysqli_num_rows($sql_select_giohang);
    if($count>0){
        $row_sanpham=mysqli_fetch_array($sql_select_giohang);
        $soluong=$row_sanpham['giohang_soluong']+1;
        $sql_giohang="UPDATE tbl_giohang SET giohang_soluong='$soluong' WHERE sanpham_id='$sanpham_id'";
    }
    else{
        $soluong=$soluong;
        $sql_giohang="INSERT INTO tbl_giohang(giohang_tensp,sanpham_id,giohang_images,giohang_soluong,giohang_gia) value ('$tensanpham','$sanpham_id','$hinhanh','$soluong','$gia')";
        }
    $insert_row=mysqli_query($con,$sql_giohang);
    if($insert_row==0){
        header('http://localhost/PCCC_Project/product.php?id='.$sanpham_id);
    }
}elseif (isset($_POST['capnhatsoluong'])) {
    for($i=0;$i<count($_POST['product_id']);$i++){
        $sanpham_id=$_POST['product_id'][$i];
        $soluong=$_POST['soluong'][$i];
        if ($soluong<=0) {
            $sql_delete=mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
        }else{
            $sql_update=mysqli_query($con,"UPDATE tbl_giohang SET giohang_soluong='$soluong' WHERE sanpham_id='$sanpham_id'");
        }
    }
}elseif(isset($_GET['xoa'])){
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($con,"DELETE FROM tbl_giohang WHERE giohang_id='$id'");

 }elseif(isset($_POST['thanhtoan'])){
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $pass=$_POST['pass'];
    $note=$_POST['note'];
    $giaohang=$_POST['giaohang'];
    $sql_khachhang=mysqli_query($con,"INSERT INTO tbl_khachhang(khachhang_ten,khachhang_sdt,khachhang_diachi,khachhang_email,khachhang_ghichu,khachhang_giaohang,khachhang_password) value ('$name','$phone','$address','$email','$note','$giaohang','$pass')");
    if($sql_khachhang){
        $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $mahang = rand(0,9999);
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
        $khachhang_id = $row_khachhang['khachhang_id'];
        $_SESSION['dangnhap_home'] = $row_khachhang['khachhang_ten'];
        $_SESSION['khachhang_id'] = $khachhang_id;

        for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            
            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,donhang_soluong,donhang_madonhang,khachhang_id,donhang_ghichu,donhang_diachi,donhang_giaohang) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$note','$address','$giaohang')");
            $sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,giaodich_soluong,giaodich_magiaodich,khachhang_id,giaodich_ghichu,giaodich_diachi,giaodich_giaohang) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$note','$address','$giaohang')");
            $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
        }

    }
 }elseif(isset($_POST['thanhtoandangnhap'])){

    $khachhang_id = $_SESSION['khachhang_id'];
    $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id='$khachhang_id'");
            $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
            $address=$row_khachhang['khachhang_diachi'];
    $note=$_POST['notedangnhap'];
    $giaohang=$_POST['giaohangdangnhap'];
    $mahang = rand(0,9999); 
    for($i=0;$i<count($_POST['thanhtoan_product_id']);$i++){
            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];
            $sql_donhang = mysqli_query($con,"INSERT INTO tbl_donhang(sanpham_id,khachhang_id,donhang_soluong,donhang_madonhang,donhang_ghichu,donhang_diachi,donhang_giaohang) values ('$sanpham_id','$khachhang_id','$soluong','$mahang','$note','$address','$giaohang')");
            $sql_giaodich = mysqli_query($con,"INSERT INTO tbl_giaodich(sanpham_id,giaodich_soluong,giaodich_magiaodich,khachhang_id,giaodich_ghichu,giaodich_diachi,giaodich_giaohang) values ('$sanpham_id','$soluong','$mahang','$khachhang_id','$note','$address','$giaohang')");
            $sql_delete_thanhtoan = mysqli_query($con,"DELETE FROM tbl_giohang WHERE sanpham_id='$sanpham_id'");
            $sql_update=mysqli_query($con,"UPDATE tbl_khachhang SET khachhang_giaohang='$giaohang',khachhang_ghichu='$note' WHERE khachhang_id='$khachhang_id'");
        }

    
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
    <!------------------------------- cart ----------------------------------------->
    <section class="cart">
        <div class="container">
            <div class="cart-top row">
                <p>TRANG CHỦ </p>
                <p>&#8594;</p>
                <p> GIỎ HÀNG VÀ THANH TOÁN </p>
            </div>
        </div>
<?php
    $sql_xemgiohang=mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id ASC")
?>

        <div class="container">
            <?php 
                if(isset($_SESSION['dangnhap_home'])){
                    echo '<p style="color:#000 ;font-weight: bold; font-size: 17px;"> Giỏ hàng của: '.$_SESSION['dangnhap_home'].'</p>';
                }else{
                    echo '';
                }
                ?>
            <div class="cart-content row">
                <div class="cart-content-left">
                    <form action="" method="post">
                        <table>
                        <tr>
                            <th>STT</th>
                            <th>SẢN PHẨM</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>SỐ LƯỢNG</th>
                            <th>GIÁ</th>
                            <th>THÀNH TIỀN</th>
                            <th>QUẢN LÝ</th>
                        </tr>
                        <?php 
                            $i=0;
                            $tongtien=0;
                            $tongsoluong=0;
                            while($row_xemgiohang=mysqli_fetch_array($sql_xemgiohang)){
                                $giatong=$row_xemgiohang['giohang_soluong']*$row_xemgiohang['giohang_gia'];
                                $tongsoluong=$tongsoluong+$row_xemgiohang['giohang_soluong'];
                                $tongtien+=$giatong;
                                $i++;
                        ?>
                        <tr>
                            <td>
                                <p><?php echo $i ?></p>
                            </td>
                            <td><img src="uploads/<?php echo $row_xemgiohang['giohang_images'] ?>" alt=""></td>
                            <td>
                                <p><?php echo $row_xemgiohang['giohang_tensp'] ?></p>
                            </td>
                            <td><input type="number" value="<?php echo $row_xemgiohang['giohang_soluong'] ?>" min="0" name="soluong[]">
                                <input type="hidden" value="<?php echo $row_xemgiohang['sanpham_id'] ?>" name="product_id[]">
                            </td>
                            <td>
                                <p><?php echo number_format($row_xemgiohang['giohang_gia'])  ?> <sup>đ</sup></p>
                            </td>
                            <td>
                                <p><?php echo number_format($giatong)  ?> <sup>đ</sup></p>
                            </td>
                            <td><a href="cart.php?xoa=<?php echo $row_xemgiohang['giohang_id'] ?>">X</a></td>
                        </tr>
                        <?php
                            }
                        ?>
                    </table>
                    <div class="capnhatgiohang">
                        <input type="submit" value="CẬP NHẬT GIỎ HÀNG" name="capnhatsoluong" class="capnhatgiohang_button">
                    </div>
                    </form>
                    
                </div>
                <div class="cart-content-right">
                    <table>
                        <tr>
                            <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                        </tr>
                        <tr>
                            <td>TỔNG SẢN PHẨM</td>
                            <td><?php echo number_format($tongsoluong)  ?></td>
                        </tr>
                        <tr>
                            <td>TỔNG TIỀN</td>
                            <td>
                                <p><?php echo number_format($tongtien)  ?><sup>đ</sup></p>
                            </td>
                        </tr>
                    </table>
                    <?php
                         if(!isset($_SESSION['dangnhap_home'])){
                     ?>
                    <form action="" method="post">
                        <div class="cart-content-right-diachi">
                        <div class="cart-content-right-diachi-title">
                            <p>THÔNG TIN VÀ ĐỊA CHỈ GIAO HÀNG</p>
                        </div>
                        <div class="cart-content-right-diachi-name">
                            <input type="text" placeholder="Nhập Họ và Tên" name="name">
                        </div>
                        <div class="cart-content-right-diachi-phone">
                            <input type="text" placeholder="Nhập SĐT" name="phone">
                        </div>
                        <div class="cart-content-right-diachi-addr">
                            <input type="text" placeholder="Nhập Địa chỉ" name="address">
                        </div>
                        <div class="cart-content-right-diachi-email">
                            <input type="text" placeholder="Nhập Email" name="email">
                        </div>
                        <div class="cart-content-right-diachi-pass">
                            <input type="text" placeholder="Nhập Mật Khẩu" name="pass">
                        </div>
                        <div class="cart-content-right-diachi-ghichu">
                            <textarea style="resize: none;" placeholder="Nhập Ghi Chú" name="note"></textarea>
                        </div>
                        <div class="cart-content-right-diachi-hinhthuc">
                            <select name="giaohang">
                                <option value="">Chọn hình thức thanh toán</option>
                                <option value="0">Thanh toán khi nhận hàng</option>
                                <option value="1">Thanh toán online</option>
                            </select>
                        </div>
                    </div>
                    <div class="cart-content-right-button">
                        <?php
                                $sql_lay_giohang = mysqli_query($con,"SELECT * FROM tbl_giohang ORDER BY giohang_id DESC");
                                while($row_thanhtoan = mysqli_fetch_array($sql_lay_giohang)){ 
                                ?>
                                    <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_thanhtoan['sanpham_id'] ?>">
                                    <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_thanhtoan['giohang_soluong'] ?>">
                                <?php
                                } 
                                ?>
                        <input type="submit" name="thanhtoan" value="THANH TOÁN" class="buttonthanhtoan">
                    </div>
                </div>
                    </form>
                <?php } ?>
                <form action="" method="post">
                    <?php 
                        $sql_giohang_select = mysqli_query($con,"SELECT * FROM tbl_giohang");
                        $count_giohang_select = mysqli_num_rows($sql_giohang_select);

                        if(isset($_SESSION['dangnhap_home']) && $count_giohang_select>0){
                            ?>
                            <div class="cart-content-right-diachi">
                            <textarea style="resize: none;" placeholder="Nhập Ghi Chú" name="notedangnhap"></textarea>
                        </div>
                    <div class="cart-content-right-diachi">
                            <select name="giaohangdangnhap">
                                <option value="">Chọn hình thức thanh toán</option>
                                <option value="0">Thanh toán khi nhận hàng</option>
                                <option value="1">Thanh toán online</option>
                            </select>
                        </div>
                            <?php
                            while($row_1 = mysqli_fetch_array($sql_giohang_select)){
                    ?>
                     
                    <div class="cart-content-right-button">
                        
                        <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row_1['sanpham_id'] ?>">
                        <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row_1['giohang_soluong'] ?>">
                                <?php 
                            }
                                ?>
                        <input type="submit" class="buttonthanhtoan" value="THANH TOÁN" name="thanhtoandangnhap">
                    </div>
                    <?php
                        } 
                    ?>
                </form>
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