<?php
include_once("inc/conn.php");

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $nama = $_POST['nama_lengkap'];
    $level = $_POST['level'];

    $insert = mysqli_query($conn, "INSERT INTO user(username,password,nama_lengkap,level) VALUES('$username','$password','$nama','$level')");

    if ($insert) {
        echo "<script>alert('Registrasi Berhasil'); location.href='index.php'</script>";
    } else {
        echo "<script>alert('Registrasi Tidak Berhasil')</script>";
    }
}
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
        select,
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
        <h2>Daftar Aplikasi</h2>

        <form method="POST">
            <input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="level">
                <option value="admin">Admin</option>
                <option value="peminjam">Peminjam</option>
            </select>
            <button type="submit" name="register">Register</button>
            <a href="index.php">Login</a>
        </form>
    </div>
</body>

</html>