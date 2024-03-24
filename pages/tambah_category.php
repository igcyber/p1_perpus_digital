<?php
if (isset($_POST['submit'])) {
    $category = $_POST['nama'];
    $query = mysqli_query($conn, "INSERT INTO category(nama) VALUES('$category')");

    if ($query) {
        echo '<script>alert("Tambah Data Berhasil");</script>';
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo '<script>alert("Tambah Data Gagal");</script>';
    }
}

?>

<form method="POST">
    <fieldset>
        <legend>Tambah Data</legend>
        <label>Nama</label> <br>
        <input type="text" name="nama" requiredd>
        <button type="submit" name="submit">Simpan</button>
    </fieldset>
</form>