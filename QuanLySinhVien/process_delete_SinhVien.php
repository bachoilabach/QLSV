<?php
$id = $_GET['masv'];
$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "delete from tblsinhvien where masv = '$id'";

mysqli_query($connect, $sql);

header('Location: index.php?delete=Xoá thành công');