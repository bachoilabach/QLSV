<?php

if (empty($_POST['ten_khoa'])) {
    header('location:form_insert.php?loi=Yêu cầu nhập đầy đủ thông tin');
}

$makhoa = $_POST['makhoa'];
$tenkhoa = $_POST['tenkhoa'];

$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "insert into tblkhoa(makhoa,tenkhoa)
value
('$makhoa','$tenkhoa')";

mysqli_query($connect, $sql);
mysqli_error($connect);

header('location:./form_quan_ly_khoa.php?insert=Thêm khoa mới thành công');
