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
            background-color: #f4f4f4;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            font-size: 20px;
        }

        h1 {
            text-align: center;
        }

        input[type="text"],
        input[type="radio"] {
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
            width: 100%;
            margin-top: 10px;
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
            padding: 10px;
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

        /* Style radio buttons */
        label {
            display: inline-block;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            display: none;
        }

        label.radio-label {
            background-color: #ddd;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="radio"]:checked+label.radio-label {
            background-color: #4caf50;
            color: white;
        }

        input[type="date"] {
            width: 90%;
            position: relative;
            height: 35px;
            outline: none;
            font-size: 1rem;
            color: #808080;
            border: 1px solid #ccc;
            margin-top: 5px;
            border-radius: 6px;
            padding: 0 15px;
            margin-bottom: 10px;
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
        Họ và tên <input type="text" name="ho_ten" required><br>
        Ngày sinh <input type="date" name="ngay_sinh" required><br>
        Giới tính:
        <input type="radio" id="nam" name="gioi_tinh" value="Nam" required>
        <label for="nam" class="radio-label">Nam</label>
        <input type="radio" id="nu" name="gioi_tinh" value="Nữ" required>
        <label for="nu" class="radio-label">Nữ</label><br>
        Quê quán <input type="text" name="que_quan" required><br>
        Ảnh <input type="text" name="anh" required><br>
        <button>Cập nhật</button>
    </form>
    <a href="index.php">Xem tất cả danh sách sinh viên</a>
</body>

</html>