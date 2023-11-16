<?php
$id = $_GET['makhoa'];
$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "delete from tblkhoa where makhoa = '$id'";

mysqli_query($connect, $sql);

header('Location: form_quan_ly_khoa.php?delete=Xoá thành công');