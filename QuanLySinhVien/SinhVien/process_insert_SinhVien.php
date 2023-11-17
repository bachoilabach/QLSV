<?php

$masv = $_POST['masv'];
$ho_ten = $_POST['ho_ten'];
$ngay_sinh = $_POST['ngay_sinh'];
$gioi_tinh = $_POST['gioi_tinh'];
$que_quan = $_POST['que_quan'];
$anh = $_POST['anh'];

$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "insert into tblsinhvien(masv,ho_ten,ngay_sinh,gioi_tinh,que_quan,anh)
value
('$masv','$ho_ten','$ngay_sinh','$gioi_tinh','$que_quan','$anh')";

mysqli_query($connect, $sql);
mysqli_error($connect);

header('location:../index.php?insert=Thêm sinh viên thành công');
