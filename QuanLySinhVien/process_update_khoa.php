<?php

$makhoa = $_POST['makhoa'];
$ten_khoa = $_POST['ten_khoa'];


$connect = mysqli_connect('localhost','root','','QLSV');
mysqli_set_charset($connect, 'utf8');

if (!$connect) {
    die('Kết nối đến cơ sở dữ liệu thất bại: ' . mysqli_connect_error());
}

$sql = "UPDATE `tblkhoa` 
set 
ten_khoa = '$ten_khoa'
where makhoa = '$makhoa'";

mysqli_query($connect, $sql);


header('location:form_quan_ly_khoa.php?update=Cập nhật thông tin khoa thành công');
