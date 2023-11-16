<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: grid;
            justify-items: center;
            align-items: center;
            height: 500px;
            background-color: #f4f4f4;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            text-align: center;
        }

        input[type="text"] {
            width: calc(100% - 20px);
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }

        button {
            padding: 10px 20px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: red;
        }

        span {
            display: block;
            margin-top: 10px;
        }

        span.error {
            color: red;
        }

        span.success {
            color: green;
        }
    </style>
</head>

<body>
    <h1>Cập nhật sinh viên</h1>
    <?php
    $masv = $_GET['masv'];
    $connect = mysqli_connect('localhost', 'root', '', 'QLSV');
    mysqli_set_charset($connect, 'utf8');
    $sql = "select * from tblsinhvien where masv = $masv";
    $ket_qua = mysqli_query($connect, $sql);
    $each = mysqli_fetch_array($ket_qua);
    ?>

    <?php
    if (isset($_GET['loi'])) {
    ?>
        <span style="color:red">
            <?php echo $_GET['loi']; ?>
        </span>
    <?php
    }
    ?>


    <form action="process_update_SinhVien.php" method="post">
        <input type="hidden" name="masv" value="<?php echo $each['masv']; ?>">

        <br>
        Họ và tên <input type="text" name="ho_ten">
        <br>
        Ngày sinh <input type="text" name="ngay_sinh">
        <br>
        Giới tính <input type="text" name="gioi_tinh">
        <br>
        Quê quán <input type="text" name="que_quan">
        <br>
        Ảnh <input type="text" name="anh">
        <button>Cập nhật</button>
    </form>
    <a href="index.php">Xem tất cả danh sách sinh viên</a>
</body>

</html>