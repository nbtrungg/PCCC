<header>
<?php
    // session_destroy();
    // unset('dangnhap');
    if(isset($_POST['dangnhap_home'])) {
        $taikhoan = $_POST['email_login'];
        $matkhau = $_POST['password_login'];
        if($taikhoan=='' || $matkhau ==''){
            echo '<script>alert("Làm ơn không để trống")</script>';
        }else{
            $sql_select_admin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_email='$taikhoan' AND khachhang_password='$matkhau' LIMIT 1");
            $count = mysqli_num_rows($sql_select_admin);
            $row_dangnhap = mysqli_fetch_array($sql_select_admin);
            if($count>0){
                $_SESSION['dangnhap_home'] = $row_dangnhap['khachhang_ten'];
                $_SESSION['khachhang_id'] = $row_dangnhap['khachhang_id'];
                
                
                // header('Location: cart.php');
            }else{
                echo '<script>alert("Tài khoản mật khẩu sai")</script>';
            }
        }
    }elseif(isset($_POST['dangky'])){
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $note = $_POST['note'];
        $address = $_POST['address'];
        $giaohang = $_POST['giaohang'];
 
        $sql_khachhang = mysqli_query($con,"INSERT INTO tbl_khachhang(khachhang_ten,khachhang_sdt,khachhang_email,khachhang_diachi,khachhang_ghichu,khachhang_giaohang,khachhang_password) values ('$name','$phone','$email','$address','$note','$giaohang','$password')");
        $sql_select_khachhang = mysqli_query($con,"SELECT * FROM tbl_khachhang ORDER BY khachhang_id DESC LIMIT 1");
        $row_khachhang = mysqli_fetch_array($sql_select_khachhang);
        $_SESSION['dangnhap_home'] = $name;
        $_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];
        
        // header('Location:cart.php');
    }elseif(isset($_GET['dangxuat'])){
    $id = $_GET['dangxuat'];
    if($id==1){
        unset($_SESSION['dangnhap_home']);
    }
}elseif(isset($_POST['capnhat'])){
        $id_thongtin=$_POST['id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $address = $_POST['address'];
        $sql_update=mysqli_query($con,"UPDATE tbl_khachhang SET khachhang_ten='$name',khachhang_sdt='$phone',khachhang_email='$email',khachhang_password='$password',khachhang_diachi='$address' WHERE khachhang_id='$id_thongtin'");
    }

?> 
<?php 
    $sql_cartegory=mysqli_query($con,'SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC')
?>
        <div class="menu">
             
            <li><a href="index.php">TRANG CHỦ</a></li>
            <li><a href="">THIẾT BỊ PCCC</a>
                <ul class="sub-menu">
                    <?php 
                        while ($row_cartegory=mysqli_fetch_array($sql_cartegory)) {
                    ?>
                    <li><a href="cartegory.php?id=<?php echo $row_cartegory['cartegory_id'] ?>"><?php echo $row_cartegory['cartegory_name'] ?></a> </li>
                    <?php 
                        }
                    ?>
                </ul>
            </li>
            <li><a href="">TIN TỨC PCCC</a></li>
            <li><a href="">THIẾT KẾ HỆ THỐNG PCCC</a></li>
            <li><a href="">LIÊN HỆ</a></li>

        </div>
        <div class="logo">
            <img src="images/logo.png">

        </div>


        <div class="other">

            <li class="search">
                <form action="timkiem.php" method="post">
                    <input placeholder="TÌM KIẾM" type="search" name="search_product"> 
                    <button style="border: none;" name="search_button" type="submit "><i class="fas fa-search"></i></button></li>
                </form>
                 <?php
                if(!isset($_SESSION['dangnhap_home'])){
             ?>
            <li>
                <a class="fa fa-paw" href="#" data-toggle="modal" data-target="#dangky"></a>
            </li>

            <li>
                <a class="fa fa-user" href="#" data-toggle="modal" data-target="#dangnhap"></a>
            </li>
            <?php } ?>
            <li>
                <a class="fa fa-shopping-bag" href="cart.php"></a>
            </li>
            <?php
                if(isset($_SESSION['dangnhap_home'])){
             ?>
            <li>
                <a class="fas fa-clipboard-list" href="donhang.php?khachhang=<?php echo $_SESSION['khachhang_id'] ?>"></a>
            </li>
            <?php } ?>
        </div>
<?php 
                if(isset($_SESSION['dangnhap_home'])){
                    echo '<p><a href="#" style="color:#000; width: 135px;" data-toggle="modal" data-target="#thongtin">'.$_SESSION['dangnhap_home'].'</a><br><a href="index.php?dangxuat=1">Đăng xuất</a></p>';
                }else{
                    echo '<p style=" width: 135px;"></p>';
                }
                ?>


    </header>
    <body>
        <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="dangnhap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">ĐĂNG NHẬP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="text" class="form-control" placeholder=" " name="email_login" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="password_login" required="">
                        </div>
                        <div class="right-w3l">
                            <input type="submit" class="form-control" name="dangnhap_home" value="Đăng nhập">
                        </div>
                        
                        <p class="text-center dont-do mt-3">Chưa có tài khoản?
                            <a href="#" data-toggle="modal" data-target="#dangky">
                                Đăng ký</a>
                        </p>
                    </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="dangky" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Đăng ký</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Tên khách hàng</label>
                            <input type="text" class="form-control" placeholder=" " name="name" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="email" required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="number" class="form-control" placeholder=" " name="phone"  required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder=" " name="address"  required="">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="password"  required="">
                            <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
                        </div>
                        
                        <div class="right-w3l">
                            <input type="submit" class="form-control" name="dangky" value="Đăng ký">
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
        if(isset($_SESSION['dangnhap_home'])){
             
        $idd=$_SESSION['khachhang_id'];
        $sql_thongtin = mysqli_query($con,"SELECT * FROM tbl_khachhang WHERE khachhang_id='$idd'");
        $row_thongtin=mysqli_fetch_array($sql_thongtin);
    }
     ?>
    <div class="modal fade" id="thongtin" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cập nhật thông tin</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label class="col-form-label">Tên khách hàng</label>
                            <input type="text" class="form-control" placeholder=" " name="name" required="" value="<?php echo $row_thongtin['khachhang_ten']  ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Email</label>
                            <input type="email" class="form-control" placeholder=" " name="email" required="" value="<?php echo $row_thongtin['khachhang_email'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder=" " name="phone"  required="" value="<?php echo $row_thongtin['khachhang_sdt'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Địa chỉ</label>
                            <input type="text" class="form-control" placeholder=" " name="address"  required="" value="<?php echo $row_thongtin['khachhang_diachi'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Mật khẩu</label>
                            <input type="password" class="form-control" placeholder=" " name="password"  required="" value="<?php echo $row_thongtin['khachhang_password'] ?>">
                            <input type="hidden" class="form-control" placeholder="" name="giaohang"  value="0">
                        </div>
                        <div class="right-w3l">
                            <input type="hidden" name="id" value="<?php echo $idd ?>">
                            <input type="submit" class="form-control" name="capnhat" value="Cập nhật">
                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
    
                </div>
            </div>
        </div>
    </div>
    </body>
