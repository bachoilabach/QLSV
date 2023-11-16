<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý người dùng</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        img {
            height: 37px;
            width: 37px;
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
        }

        header ul li a{
            text-decoration: none;
            color: black;
            padding: 20px;
        }

        header ul li a:hover {
            cursor: pointer;
            background-color: #ccc;
            opacity: 0.8;
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
            padding: 10px;
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
            padding: 10px;
        }

        .Del {
            color: white;
            text-decoration: none;
            padding: 10px;

        }

        /* .Change:hover {
            background-color: #6dd5ed;
        }

        .Del:hover {
            background-color: #f12711;
        } */
    </style>
</head>

<body>
    <header>
        <img src="https://cdn3.vectorstock.com/i/1000x1000/06/62/management-business-logo-template-concept-vector-31080662.jpgs" />
        <ul>
            <li><a href="index.php">Quản lý sinh viên</a></li>
            <li><a href="form_quan_ly_khoa.php">Quản lý khoa</a></li>
            <li><a href="form_quan_ly_lop.php">Quản lý lớp</a></li>
            <li><a href="form_quan_ly_nguoi_dung.php">Quản lý người dùng</a></li>
            <li><a href="Login.php">Đăng xuất</a></li>

        </ul>
    </header>
    <h1>DANH SÁCH LỚP</h1>
    <!-- Ket noi database -->
    <?php
    $connect = mysqli_connect('localhost', 'root', '', 'qlsv');
    mysqli_set_charset($connect, 'utf8');

    $sql = "select * from tbuser";
    $ket_qua = mysqli_query($connect, $sql);
    ?>
    <div class="header">
        <div class="add">
            <a href="form_insert_nguoi_dung.php" class="addTitle">
                Thêm người dùng
            </a>
        </div>

        <form action="process_search_nguoidung.php" method="get">
            <input type="search" name="tim_kiem">
            <input type="submit" value="Tìm kiếm">
        </form>
    </div>
    <br>
    <?php
    if (isset($_GET['insert'])) {
    ?>
        <span style="color:green;font-size: 20px;margin-left: 30px;">
            <?php echo $_GET['insert']; ?>
        </span>
    <?php
    }
    ?>

    <?php
    if (isset($_GET['update'])) {
    ?>
        <span style="color:green;font-size: 20px;margin-left: 30px;">
            <?php echo $_GET['update']; ?>
        </span>
    <?php
    }
    ?>

    <?php
    if (isset($_GET['delete'])) {
    ?>
        <span style="color:green;font-size: 20px;margin-left: 30px;">
            <?php echo $_GET['delete']; ?>
        </span>
    <?php
    }
    ?>
    <!--  -->
    <table>
        <tr>
            <th>ID</th>
            <th>Họ và tên</th>
            <th>Tài khoản</th>
            <th>Mật khẩu</th>
            <th>Thao tác</th>
        </tr>

        <?php foreach ($ket_qua as $each) : ?>
            <tr>
                <td>
                    <span><?php echo $each['id'] ?></span>
                </td>
                <td>
                    <?php echo $each['fullname'] ?>
                </td>
                <td>
                    <?php echo $each['username'] ?>
                </td>
                <td>
                    <?php echo $each['password']?>
                </td>
                <td class="functional">
                    <div style="background-color: #6dd5ed;">
                        <a class="Change" href="form_update_nguoi_dung.php?id=<?php echo $each['id'] ?>">Sửa</a>
                    </div>
                    <div style="background-color: #f12711;">
                        <a class="Del" href="process_delete_nguoi_dung.php?id=<?php echo $each['id'] ?>">Xoá</a>
                    </div>
                </td>
            </tr>
        <?php endforeach ?>

    </table>
</body>

</html>
