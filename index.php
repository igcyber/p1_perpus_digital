<?php
include_once("conn.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Perpustakaan Digial</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="password"],
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Login Aplikasi</h2>
        <?php
        if (isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = md5($_POST['password']);
            // echo "$username $password";
            $data = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
            $check = mysqli_num_rows($data);
            if ($check > 0) {
                $_SESSION['user'] = mysqli_fetch_array($data);
                echo "<script>alert('Selamat Datang, Login Berhasil'); location.href='dashboard.php'</script>";
            } else {
                echo "<script>alert('Mohon Maaf Username/Password Salah')</script>";
            }
        }
        ?>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
            <a href="register.php">Belum Punya Akun</a>
        </form>
    </div>
</body>

</html>