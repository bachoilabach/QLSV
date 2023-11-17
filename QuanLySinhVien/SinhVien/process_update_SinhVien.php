<?php

$masv = $_POST['masv'];
$ho_ten = $_POST['ho_ten'];
$ngay_sinh = $_POST['ngay_sinh'];
$gioi_tinh = $_POST['gioi_tinh'];
$que_quan = $_POST['que_quan'];
$anh = $_POST['anh'];

$connect = mysqli_connect('localhost','root','','QLSV');
mysqli_set_charset($connect, 'utf8');

if (!$connect) {
    die('Kết nối đến cơ sở dữ liệu thất bại: ' . mysqli_connect_error());
}

$sql = "UPDATE `tblsinhvien` 
set 
ho_ten = '$ho_ten', 
ngay_sinh = '$ngay_sinh', 
gioi_tinh = '$gioi_tinh',
que_quan = '$que_quan', 
anh = '$anh'
where masv = '$masv'";

mysqli_query($connect, $sql);


header('location: ../index.php?update=Cập nhật thông tin sinh viên thành công');
