<?php

$malop = $_POST['malop'];
$makhoa = $_POST['makhoa'];
$ten_lop = $_POST['ten_lop'];


$connect = mysqli_connect('localhost','root','','QLSV');
mysqli_set_charset($connect, 'utf8');

if (!$connect) {
    die('Kết nối đến cơ sở dữ liệu thất bại: ' . mysqli_connect_error());
}

$sql = "UPDATE `tbllop` 
set 
makhoa = '$makhoa',
ten_lop = '$ten_lop'
where malop = '$malop'";

mysqli_query($connect, $sql);


header('location:./form_quan_ly_lop.php?update=Cập nhật thông tin lớp thành công');
