<h1>Aplikasi Perpustakaan Digital</h1>
<h4>Anda Login Sebagai : <?php echo $_SESSION['user']['level']; ?> </h4>
<div class="navbar">
    <ul>
        <?php if ($_SESSION['user']['level'] != 'peminjam') { ?>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="category.php">Master Kategori</a></li>
            <li><a href="#">Master Buku</a></li>
        <?php } else { ?>
            <li><a href="#">Master Peminjaman</a></li>
        <?php } ?>
        <li><a href="#">Master Ulasan</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>