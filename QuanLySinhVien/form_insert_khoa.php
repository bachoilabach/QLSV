<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sinh Viên</title>
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
    <h1>Thêm khoa vào danh sách</h1>

    <?php if(isset($_GET['loi'])) { ?>
        <span class="error">
            <?php echo $_GET['loi']; ?>
        </span>
    <?php } ?>

    <?php if(isset($_GET['success'])) { ?>
        <span class="success">
            <?php echo $_GET['success']; ?>
        </span>
    <?php } ?>

    <form action="process_insert_khoa.php" method="post">
        Tên khoa <input type="text" name="ten_khoa"><br>
        <button type="submit">Thêm</button>
    </form>

    <a href="form_quan_ly_khoa.php" class="">Xem danh sách khoa</a>
</body>
</html>
