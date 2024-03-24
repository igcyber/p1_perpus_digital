<?php
include_once('../layout/head.php');
?>

<body>
    <div class="container">
        <?php
        include('../layout/nav.php');

        //proses delete
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_category'])) {
            $categoryId = $_POST['category_id'];

            // Lakukan proses penghapusan data disini, misalnya:
            $deleteQuery = mysqli_query($conn, "DELETE FROM category WHERE category_id = $categoryId");

            // Redirect atau tampilkan pesan setelah penghapusan data
            header("Location: category.php");
            exit();
        }
        ?>
        <div class="cards">

            <table border="2">
                <tr>
                    <th style="width: 90px;">
                        No
                    </th>
                    <th style="width: 400px;">
                        Nama Kategori
                    </th>
                    <th style="width: 150px;">
                        Pilihan
                    </th>
                </tr>
                <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT * FROM category");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr align="center">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td>
                            <a href="ubah_category.php?id=<?php echo $data['category_id']; ?>">Ubah</a>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="category_id" value="<?php echo $data['category_id']; ?>">
                                <button type="submit" name="delete_category" onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </table>

            <?php
            include('tambah_category.php');
            ?>

        </div>
    </div>
</body>

</html>