<?php
$id = $_GET['id'];
$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "delete from tbluser where id = '$id'";

mysqli_query($connect, $sql);

header('Location: ./form_quan_ly_nguoi_dung.php?delete=Xoá thành công');