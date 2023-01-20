
<?php 
session_start();
    include_once('db/connect.php');
?>
<?php 
    if(isset($_GET['huydon'])&&isset($_GET['magiaodich'])){
        $huydon=$_GET['huydon'];
        $magiaodich=$_GET['magiaodich'];
    }else{
        $huydon='';
        $magiaodich='';
    }
    $sql_update_donhang = mysqli_query($con,"UPDATE tbl_donhang SET donhang_huydon='$huydon' WHERE donhang_madonhang='$magiaodich'");
    $sql_update_giaodich = mysqli_query($con,"UPDATE tbl_giaodich SET giaodich_huydon='$huydon' WHERE giaodich_magiaodich='$magiaodich'");
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

    <!------------------------------- donhang ----------------------------------------->
    <div class="container" id="donhang">
        <div class="container-fluid">
        <div class="row">
            <div class="cartegory-top row">
                <p>TRANG CHỦ </p>
                <p>&#8594;</p>
                <p> LỊCH SỬ ĐƠN HÀNG</p>
                
            </div>

            <div class="col-md-12">
                <h4>Liệt kê lịch sử đơn hàng</h4>
                <?php
                if(isset($_GET['khachhang'])){
                    $id_khachhang = $_GET['khachhang'];
                }else{
                    $id_khachhang = '';
                }
                $sql_select = mysqli_query($con,"SELECT * FROM tbl_giaodich WHERE tbl_giaodich.khachhang_id='$id_khachhang' GROUP BY tbl_giaodich.giaodich_magiaodich ORDER BY tbl_giaodich.giaodich_id DESC"); 
                ?> 
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Mã giao dịch</th>
                        <th>Ngày đặt</th>
                        <th>Tình trạng</th>
                        <th>Quản lý</th>
                        <th>Yêu cầu</th>
                        
                    </tr>
                    <?php
                    $i = 0;
                    while($row_donhang = mysqli_fetch_array($sql_select)){ 
                        $i++;
                    ?> 
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        <td><?php echo $row_donhang['giaodich_magiaodich']; ?></td>
                        
                        <td><?php echo $row_donhang['giaodich_ngaythang'] ?></td>

                        <td><?php 
                            if($row_donhang['giaodich_tinhtrang']==0&&$row_donhang['giaodich_huydon']==0){
                                echo 'Đã đặt hàng';
                            }if($row_donhang['giaodich_tinhtrang']==0&&$row_donhang['giaodich_huydon']==1){
                                echo 'Đang yêu cầu huỷ';
                            }
                            if($row_donhang['giaodich_tinhtrang']==0&&$row_donhang['giaodich_huydon']==2){
                                echo 'Đã huỷ';
                            }
                            if($row_donhang['giaodich_tinhtrang']==1&&$row_donhang['giaodich_huydon']==0){
                                echo 'Đã xử lý | Đang giao hàng';
                            }
                         ?></td>
                    
                        <td><a href="?khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php  echo $row_donhang['giaodich_magiaodich']  ?>">Xem chi tiết</a></td>

                        <td>
                            <?php 
                            if($row_donhang['giaodich_huydon']==0){
                            ?>
                            <a href="?khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php  echo $row_donhang['giaodich_magiaodich'] ?>&huydon=1">Huỷ đơn</a>
                            <?php
                            }elseif ($row_donhang['giaodich_huydon']==1) {
                             ?>
                            <p>Đang chờ huỷ...</p>
                            <?php
                            }else{
                                echo 'Đã huỷ';
                            } ?>
                            
                        </td>
                    </tr>
                     <?php
                    } 
                    ?> 
                </table>
            </div>

            <div class="col-md-12">
                <h4>Liệt kê lịch sử đơn hàng</h4>
                <?php
                if(isset($_GET['magiaodich'])){
                    $magiaodich = $_GET['magiaodich'];
                }else{
                    $magiaodich = '';
                }
                $sql_select = mysqli_query($con,"SELECT * FROM tbl_giaodich,tbl_khachhang,tbl_sanpham WHERE tbl_giaodich.sanpham_id=tbl_sanpham.sanpham_id AND tbl_khachhang.khachhang_id=tbl_giaodich.khachhang_id AND tbl_giaodich.giaodich_magiaodich='$magiaodich' ORDER BY tbl_giaodich.giaodich_id DESC"); 
                ?> 
                <table class="table table-bordered ">
                    <tr>
                        <th>Thứ tự</th>
                        <th>Mã giao dịch</th>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th>Địa chỉ</th>
                        <th>Giao hàng</th>
                        <th>Ngày đặt</th>
                        
                    </tr>
                    <?php
                    $i = 0;
                    while($row_donhang = mysqli_fetch_array($sql_select)){ 
                        $i++;
                    ?> 
                    <tr>
                        <td><?php echo $i; ?></td>
                        
                        <td><?php echo $row_donhang['giaodich_magiaodich']; ?></td>
                    
                        <td><?php echo $row_donhang['sanpham_name']; ?></td>

                        <td><?php echo $row_donhang['giaodich_soluong']; ?></td>
                        <td><?php echo $row_donhang['sanpham_gia']; ?></td>
                        <td><?php echo number_format($row_donhang['sanpham_gia']*$row_donhang['giaodich_soluong']) ?></td>
                        <td><?php echo $row_donhang['giaodich_diachi']; ?></td>
                        <?php if($row_donhang['giaodich_giaohang']==0){?>
                        <td>Thanh toán khi nhận hàng</td>
                    <?php } ?>
                        <?php if($row_donhang['giaodich_giaohang']==1){?>
                        <td>Thanh toán online</td>
                    <?php } ?>
                        
                        <td><?php echo $row_donhang['giaodich_ngaythang'] ?></td>
                    
                    
                    </tr>
                     <?php
                    } 
                    ?> 
                </table>
            </div>
        </div>
    </div>
    </div>
    

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