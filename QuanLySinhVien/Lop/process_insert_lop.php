<?php

if (empty($_POST['makhoa'])|| empty($_POST['ten_khoa'])) {
    header('location:form_insert.php?loi=Yêu cầu nhập đầy đủ thông tin');
}

$makhoa = $_POST['makhoa'];
$malop = $_POST['malop'];
$ten_lop = $_POST['ten_lop'];


$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "insert into tbllop(makhoa,malop,ten_lop)
value
('$makhoa','$malop','$ten_lop')";

mysqli_query($connect, $sql);
mysqli_error($connect);

header('location:./form_quan_ly_lop.php?insert=Thêm lớp mới thành công');
