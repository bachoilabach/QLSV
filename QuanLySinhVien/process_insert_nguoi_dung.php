<?php

$id = $_POST['id'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];


$connect = mysqli_connect('localhost', 'root', '', 'QLSV');
mysqli_set_charset($connect, 'utf8');

$sql = "insert into tbluser(id,fullname,username,password)
value
('$id','$fullname','$username','$password')";

mysqli_query($connect, $sql);
mysqli_error($connect);

header('location:form_quan_ly_nguoi_dung.php?insert=Thêm người dùng mới thành công');
