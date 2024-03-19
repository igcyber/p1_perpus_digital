<?php
include_once("conn.php");
if (!isset($_SESSION['user'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .navbar {
            background-color: #007bff;
            padding: 10px;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 20px;
        }

        .navbar ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .navbar li {
            margin-right: 20px;
        }

        .navbar a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .navbar a:hover {
            text-decoration: underline;
        }

        .cards {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .card {
            width: calc(24%);
            margin-bottom: 20px;
            background-color: #007bff;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .card h2 {
            margin-bottom: 10px;
            font-size: 24px;
        }

        .card p {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Aplikasi Perpustakaan Digital</h1>
        <h4>Anda Login Sebagai : <?php echo $_SESSION['user']['level']; ?> </h4>
        <div class="navbar">
            <ul>
                <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
                    <li><a href="#">Master Buku</a></li>
                    <li><a href="#">Master Kategori</a></li>
                <?php } else { ?>
                    <li><a href="#">Master Peminjaman</a></li>
                <?php } ?>
                <li><a href="#">Master Ulasan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        <div class="cards">
            <div class="card">
                <h2>Total Buku</h2>
                <p> <?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM book")) ?></p>
            </div>
            <div class="card">
                <h2>Total Kategori</h2>
                <p><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM category")) ?></p>
            </div>
            <div class="card">
                <h2>Total Ulasan</h2>
                <p><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM review_book")) ?></p>
            </div>
            <div class="card">
                <h2>Total Pengguna</h2>
                <p><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM user")) ?></p>
            </div>
        </div>
    </div>
</body>

</html>