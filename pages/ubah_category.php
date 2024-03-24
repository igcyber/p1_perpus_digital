<?php
include_once("../inc/conn.php");
$id = $_GET['id'];
if (isset($_POST['update'])) {
    $category = $_POST['nama'];
    $query = mysqli_query($conn, "UPDATE category SET nama = '$category' WHERE category_id = $id");

    if ($query) {
        echo '<script>alert("Data Berhasil Diperbarui")</script> ';
        echo '<script>location.href="category.php"</script>';
    } else {
        echo '<script>alert("Data Gagal Diperbarui");</script>';
    }
}

?>

<form method="POST">
    <fieldset>
        <legend>Perbarui Data</legend>
        <label>Nama</label> <br>
        <?php
        $query = mysqli_query($conn, "SELECT * FROM category WHERE category_id=$id");
        $data = mysqli_fetch_array($query); ?>
        <input type="text" name="nama" value="<?php echo $data['nama']; ?>">
        <button type="submit" name="update">Perbarui</button>
    </fieldset>
</form>