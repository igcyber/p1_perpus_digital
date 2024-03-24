<?php
include_once('../layout/head.php');
?>

<body>
    <div class="container">
        <?php
        include('../layout/nav.php');
        ?>
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