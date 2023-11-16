<?php

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];

$connect = mysqli_connect('localhost','root','','QLSV');
mysqli_set_charset($connect, 'utf8');

if (!$connect) {
    die('Kết nối đến cơ sở dữ liệu thất bại: ' . mysqli_connect_error());
}

$sql = "UPDATE `tbuser` 
set 
fullname = '$fullname', 
username = '$username', 
password = '$password'
where id = '$id'";

mysqli_query($connect, $sql);


header('location:form_quan_ly_nguoi_dung.php?update=Cập nhật thông tin người dùng thành công');
