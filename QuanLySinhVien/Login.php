<?php
$servername = "localhost:3306";
$database = "qlsv";
$username_db = "root";
$password_db = "";

$connect = mysqli_connect($servername, $username_db, $password_db, $database);
if (!$connect) {
    die("Không có kết nối: " . mysqli_connect_error());
    // exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $sql = "SELECT * FROM tbluser WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($connect, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        session_start();
        $_SESSION["username"] = $username;
        header("Location: index.php");
        $message = "Đăng nhập thành công";
    } else {
        $message = "Đăng nhập thất bại";
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            /* text-align: center; */
        }

        h2 {
            color: #333;
            text-align: center;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        #message {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <h2>Đăng nhập</h2>
        <label for="username">Tên đăng nhập:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Mật khẩu:</label>
        <input type="password" name="password" required>
        <br>
        <input type="submit" value="Đăng nhập">
        <div id="message"><?php echo $message; ?></div>
    </form>
</body>

</html>