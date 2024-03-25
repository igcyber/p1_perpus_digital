<?php
include_once("../inc/conn.php");
$id = $_GET['id'];

if (isset($_POST['submit'])) {
    $category = $_POST['kategori_id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $deskripsi = $_POST['deskripsi'];
    $query = mysqli_query($conn, "INSERT INTO book(kategori_id, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES('$category', '$judul', '$penulis', '$penerbit', '$tahun', '$deskripsi')");

    if ($query) {
        echo '<script>alert("Ubah Data Berhasil");</script>';
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo '<script>alert("Ubah Data Gagal");</script>';
    }
}

?>

<form method="POST" style="width: 420px;">
    <fieldset>
        <legend>Tambah Buku</legend>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM book WHERE book_id = $id");
        $data = mysqli_fetch_array($query);
        ?>
        <label>Kategori</label> <br>
        <select name="kategori_id" style="width: 410px;">
            <?php
            $categoryResult = mysqli_query($conn, "SELECT * FROM category");
            while ($category = mysqli_fetch_assoc($categoryResult)) {
            ?>
                <option <?php if ($data['kategori_id'] == $category['category_id']) echo 'selected'; ?> value=" <?php echo $category['category_id']; ?>">
                    <?php echo $category['nama'] ?>
                </option>
            <?php
            }
            ?>
        </select> <br> <br>
        <label>Judul</label> <br>
        <input type="text" name="judul" required style="width: 400px;"> <br> <br>
        <label>Penulis</label> <br>
        <input type="text" name="penulis" required style="width: 400px;"> <br> <br>
        <label>Penerbit</label> <br>
        <input type="text" name="penerbit" required style="width: 400px;"> <br> <br>
        <label>Tahun Terbit</label> <br>
        <input type="number" name="tahun" min="1900" max="2099" step="1" value="2024" style="width: 400px;" /> <br> <br>
        <label>Deskripsi</label> <br>
        <textarea name="deskripsi" rows="5" style="width: 400px;"></textarea> <br> <br>
        <button type="submit" name="submit">Simpan</button>
        <a href="book.php">Kembali</a>
    </fieldset>
</form>