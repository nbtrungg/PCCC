
<?php
	include('../db/connect.php');
?>
<?php
	session_start();
	if(!isset($_SESSION['dangnhap'])){
		header('Location: index.php');
	} 
	if(isset($_GET['login'])){
 	$dangxuat = $_GET['login'];
	 }else{
	 	$dangxuat = '';
	 }
	 if($dangxuat=='dangxuat'){
	 	session_destroy();
	 	header('Location: index.php');
	 }
?>
<?php
	if(isset($_POST['themsanpham'])){
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';
		
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$sql_insert_product = mysqli_query($con,"INSERT INTO tbl_sanpham(cartegory_id,sanpham_name,sanpham_gia,sanpham_soluong,sanpham_images,sanpham_chitiet,sanpham_baoquan) values ('$danhmuc','$tensanpham','$gia','$soluong','$hinhanh','$chitiet','$mota')");
		move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
	}elseif(isset($_POST['capnhatsanpham'])) {
		$id_update = $_POST['id_update'];
		$tensanpham = $_POST['tensanpham'];
		$hinhanh = $_FILES['hinhanh']['name'];
		$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
		$soluong = $_POST['soluong'];
		$gia = $_POST['giasanpham'];
		$danhmuc = $_POST['danhmuc'];
		$chitiet = $_POST['chitiet'];
		$mota = $_POST['mota'];
		$path = '../uploads/';

		if($hinhanh==''){
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_baoquan='$mota',sanpham_gia='$gia',sanpham_soluong='$soluong',cartegory_id='$danhmuc' WHERE sanpham_id='$id_update'";

		}else{
			move_uploaded_file($hinhanh_tmp,$path.$hinhanh);
			$sql_update_image = "UPDATE tbl_sanpham SET sanpham_name='$tensanpham',sanpham_chitiet='$chitiet',sanpham_baoquan='$mota',sanpham_gia='$gia',sanpham_soluong='$soluong',sanpham_images='$hinhanh',cartegory_id='$danhmuc' WHERE sanpham_id='$id_update'";
		}

		mysqli_query($con,$sql_update_image);


	}

	
?> 
<?php
	if(isset($_GET['xoa'])){
		$id= $_GET['xoa'];
		$sql_xoa = mysqli_query($con,"DELETE FROM tbl_sanpham WHERE sanpham_id='$id'");
	} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>S???n ph???m</title>
	<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="adminstyle.css">
</head>
<body id="bodyadmin">
	<p>Xin ch??o : <?php echo $_SESSION['dangnhap'] ?> <a href="?login=dangxuat">????ng xu???t</a></p>
	<nav class="navbar navbar-expand-lg navbar-light thanhcongcu">
	  <div class="collapse navbar-collapse thanhcongcu" id="navbarNav">
	    <ul class="navbar-nav">
	      <li class="nav-item active">
	        <a class="nav-link" href="xulydonhang.php">????n h??ng <span class="sr-only">(current)</span></a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulydanhmuc.php">Danh m???c</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulydanhmucbaiviet.php">Danh m???c B??i vi???t</a>
	      </li>
	         <li class="nav-item">
	        <a class="nav-link" href="xulybaiviet.php">B??i vi???t</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="xulysanpham.php">S???n ph???m</a>
	      </li>
	       <li class="nav-item">
	        <a class="nav-link" href="xulykhachhang.php">Kh??ch h??ng</a>
	      </li>
	      
	    </ul>
	  </div>
	</nav><br><br>
	<div class="container">
		<div class="row">
		<?php
			if(isset($_GET['quanly'])=='capnhat'){
				$id_capnhat = $_GET['capnhat_id'];
				$sql_capnhat = mysqli_query($con,"SELECT * FROM tbl_sanpham WHERE sanpham_id='$id_capnhat'");
				$row_capnhat = mysqli_fetch_array($sql_capnhat);
				$id_category_1 = $row_capnhat['cartegory_id'];
				?>
				<div class="col-md-4">
				<h4>C???p nh???t s???n ph???m</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>T??n s???n ph???m</label>
					<input type="text" class="form-control" name="tensanpham" value="<?php echo $row_capnhat['sanpham_name'] ?>"><br>
					<input type="hidden" class="form-control" name="id_update" value="<?php echo $row_capnhat['sanpham_id'] ?>">
					<label>H??nh ???nh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<img src="../uploads/<?php echo $row_capnhat['sanpham_images'] ?>" height="80" width="80"><br>
					<label>Gi??</label>
					<input type="text" class="form-control" name="giasanpham" value="<?php echo $row_capnhat['sanpham_gia'] ?>"><br>
					<label>S??? l?????ng</label>
					<input type="text" class="form-control" name="soluong" value="<?php echo $row_capnhat['sanpham_soluong'] ?>"><br>
					<label>B???o qu???n</label>
					<textarea class="form-control" rows="10" name="mota"><?php echo $row_capnhat['sanpham_baoquan'] ?></textarea><br>
					<label>Chi ti???t</label>
					<textarea class="form-control" rows="10" name="chitiet"><?php echo $row_capnhat['sanpham_chitiet'] ?></textarea><br>
					<label>Danh m???c</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Ch???n danh m???c-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
							if($id_category_1==$row_danhmuc['cartegory_id']){
						?>
						<option selected value="<?php echo $row_danhmuc['cartegory_id'] ?>"><?php echo $row_danhmuc['cartegory_name'] ?></option>
						<?php 
							}else{
						?>
						<option value="<?php echo $row_danhmuc['cartegory_id'] ?>"><?php echo $row_danhmuc['cartegory_name'] ?></option>
						<?php
							}
						}
						?>
					</select><br>
					
					<input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" class="btn btn-default" >
					<a href="xulysanpham.php" class="btnthemsanpham">Th??m s???n ph???m</a>

				</form>
				</div>
			<?php
			}else{
				?> 
				<div class="col-md-4">
				<h4>Th??m s???n ph???m</h4>
				
				<form action="" method="POST" enctype="multipart/form-data">
					<label>T??n s???n ph???m</label>
					<input type="text" class="form-control" name="tensanpham" placeholder="T??n s???n ph???m"><br>
					<label>H??nh ???nh</label>
					<input type="file" class="form-control" name="hinhanh"><br>
					<label>Gi??</label>
					<input type="text" class="form-control" name="giasanpham" placeholder="Gi?? s???n ph???m"><br>
					<label>S??? l?????ng</label>
					<input type="text" class="form-control" name="soluong" placeholder="S??? l?????ng"><br>
					<label>B???o Qu???n</label>
					<textarea class="form-control" name="mota"></textarea><br>
					<label>Chi ti???t</label>
					<textarea class="form-control" name="chitiet"></textarea><br>
					<label>Danh m???c</label>
					<?php
					$sql_danhmuc = mysqli_query($con,"SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC"); 
					?>
					<select name="danhmuc" class="form-control">
						<option value="0">-----Ch???n danh m???c-----</option>
						<?php
						while($row_danhmuc = mysqli_fetch_array($sql_danhmuc)){
						?>
						<option value="<?php echo $row_danhmuc['cartegory_id'] ?>"><?php echo $row_danhmuc['cartegory_name'] ?></option>
						<?php 
						}
						?>
					</select><br>
					<input type="submit" name="themsanpham" value="Th??m s???n ph???m" class="btn btn-default">
				</form>
				</div>
				<?php
			} 
			
				?>
			<div class="col-md-8">
				<h4>Li???t k?? s???n ph???m</h4>
				<?php
				$sql_select_sp = mysqli_query($con,"SELECT * FROM tbl_sanpham,tbl_cartegory WHERE tbl_sanpham.cartegory_id=tbl_cartegory.cartegory_id ORDER BY tbl_sanpham.sanpham_id DESC"); 
				?> 
				<table class="table table-bordered ">
					<tr>
						<th>Th??? t???</th>
						<th>T??n s???n ph???m</th>
						<th>H??nh ???nh</th>
						<th>S??? l?????ng</th>
						<th>Danh m???c</th>
						<th>Gi?? s???n ph???m</th>
						<th>Qu???n l??</th>
					</tr>
					<?php
					$i = 0;
					while($row_sp = mysqli_fetch_array($sql_select_sp)){ 
						$i++;
					?> 
					<tr>
						<td><?php echo $i ?></td>
						<td><?php echo $row_sp['sanpham_name'] ?></td>
						<td><img src="../uploads/<?php echo $row_sp['sanpham_images'] ?>" height="100" width="80"></td>
						<td><?php echo $row_sp['sanpham_soluong'] ?></td>
						<td><?php echo $row_sp['cartegory_name'] ?></td>
						<td><?php echo number_format($row_sp['sanpham_gia']).'vn??' ?></td>
						<td><a href="?xoa=<?php echo $row_sp['sanpham_id'] ?>">X??a</a> || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sp['sanpham_id'] ?>">C???p nh???t</a></td>
					</tr>
				<?php
					} 
					?> 
				</table>
			</div>
		</div>
	</div>
	
</body>
</html>