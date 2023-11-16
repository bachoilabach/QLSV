<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả tìm kiếm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        img {
            height: 50px;
            width: 50px;
            border-radius: 50%;
        }

        table {
            background-color: #f0f0f5;
            width: 90%;
            border-collapse: collapse;
            margin: 20px 100px;
        }

        table th,
        table td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: #ddd;
            padding: 10px 20px;
        }

        header ul {
            display: flex;
            justify-content: space-around;
            align-items: center;
            margin: 0;
            padding: 0;
            list-style: none;
        }

        header ul li {
            list-style: none;
            font-size: 20px;
            margin-right: 20px;
            padding: 20px;
        }

        header ul li:hover {
            cursor: pointer;
            color: aqua;
            background-color: #ccc;
            opacity: 0.8;

        }

        header ul li a {
            text-decoration: none;
            color: black;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
        }

        .add {
            background-color: #ddd;
            padding: 10px;
            border-radius: 10px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
        }

        .addTitle {
            font-size: 20px;
            text-decoration: none;
            color: black;
        }

        input[type="search"] {
            padding: 14px;
            border-radius: 4px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            font-size: 18px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .functional {
            display: flex;
            justify-content: space-evenly;
        }

        .functional div {
            padding: 6px 12px;
            border-radius: 5px;
            margin: 5px;
            cursor: pointer;
        }

        .Change {
            color: black;
            text-decoration: none;
        }

        .Del {
            color: white;
            text-decoration: none;
        }

        .Change:hover {
            background-color: #6dd5ed;
        }

        .Del:hover {
            background-color: #f12711;
        }
        a {
            display: block;
            /* text-align: center; */
            margin-top: 10px;
            text-decoration: none;
            color: red;
            margin-left: 5%;
        }
    </style>
</head>

<body>
    <h1>KẾT QUẢ TÌM KIẾM SINH VIÊN</h1>

    <?php
    // Kết nối đến cơ sở dữ liệu
    $connect = mysqli_connect('localhost', 'root', '', 'QLSV');
    mysqli_set_charset($connect, 'utf8');

    // Lấy từ khóa tìm kiếm từ biến GET
    $keyword = $_GET['tim_kiem'];

    // Truy vấn tìm kiếm
    $sql = "SELECT * FROM tblsinhvien WHERE ho_ten LIKE '%$keyword%' OR masv LIKE '%$keyword%' OR que_quan LIKE '%$keyword%'";
    $ket_qua = mysqli_query($connect, $sql);
    ?>

    <table>
        <tr>
            <th>Mã sinh viên</th>
            <th>Họ tên</th>
            <th>Ngày sinh</th>
            <th>Giới tính</th>
            <th>Quê quán</th>
            <th>Ảnh</th>
        </tr>

        <?php foreach ($ket_qua as $each) : ?>
            <tr>
                <td>
                    <span><?php echo $each['masv'] ?></span>
                </td>
                <td>
                    <?php echo $each['ho_ten'] ?>
                </td>
                <td>
                    <?php echo $each['ngay_sinh'] ?>
                </td>
                <td>
                    <?php echo $each['gioi_tinh'] ?>
                </td>
                <td>
                    <?php echo $each['que_quan'] ?>
                </td>
                <td>
                    <img src="<?php echo $each['anh'] ?>" alt="">
                </td>
            </tr>
        <?php endforeach ?>

    </table>
    <a href="index.php" class="">Xem danh sách tất cả sinh viên</a>
</body>

</html>