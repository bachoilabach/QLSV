<?php
$id = $_GET['malop'];
$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "delete from tbllop where malop = '$id'";

mysqli_query($connect, $sql);

header('Location: ./form_quan_ly_lop.php?delete=Xoá thành công');