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
            /* height: 500px; */
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
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: #45a049;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: red;
            padding: 10px;
        }

        span {
            display: block;
            margin-top: 50px;
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
    <h1>Cập nhật thông tin khoa</h1>
    <?php
    $makhoa = $_GET['makhoa'];
    $connect = mysqli_connect('localhost', 'root', '', 'QLSV');
    mysqli_set_charset($connect, 'utf8');
    $sql = "select * from tblkhoa where makhoa = $makhoa";
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


    <form action="process_update_khoa.php" method="post">
    <input type="hidden" name="makhoa" value="<?php echo $each['makhoa']; ?>">
        Tên khoa <input type="text" name="ten_khoa" value="<?php echo $each['tenkhoa']; ?>" required><br>
        <button>Cập nhật</button>
    </form>
    <a href="form_quan_ly_khoa.php">Xem tất cả danh sách sinh viên</a>
</body>

</html>