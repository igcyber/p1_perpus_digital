<?php
if (isset($_POST['submit'])) {
    $category = $_POST['kategori_id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun = $_POST['tahun'];
    $deskripsi = $_POST['deskripsi'];
    $query = mysqli_query($conn, "INSERT INTO book(kategori_id, judul, penulis, penerbit, tahun_terbit, deskripsi) VALUES('$category', '$judul', '$penulis', '$penerbit', '$tahun', '$deskripsi')");

    if ($query) {
        echo '<script>alert("Tambah Data Berhasil");</script>';
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo '<script>alert("Tambah Data Gagal");</script>';
    }
}

?>

<form method="POST" style="width: 420px;">
    <fieldset>
        <legend>Tambah Buku</legend>
        <label>Kategori</label> <br>
        <select name="kategori_id" style="width: 410px;">
            <?php
            $category = mysqli_query($conn, "SELECT * FROM category");
            $data = mysqli_fetch_array($category);
            while ($data = mysqli_fetch_array($category)) {
            ?>
                <option value=" <?php echo $data['category_id']; ?>">
                    <?php echo $data['nama']; ?>
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
    </fieldset>
</form>