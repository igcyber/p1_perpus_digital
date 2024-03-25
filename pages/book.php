<?php
include_once('../layout/head.php');
?>

<body>
    <div class="container">
        <?php
        include('../layout/nav.php');

        //proses delete
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_book'])) {
            $bookId = $_POST['book_id'];

            // Lakukan proses penghapusan data disini, misalnya:
            $deleteQuery = mysqli_query($conn, "DELETE FROM book WHERE book_id = $bookId");

            // Redirect atau tampilkan pesan setelah penghapusan data
            header("Location: book.php");
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
                    <th style="width: 400px;">
                        Judul Buku
                    </th>
                    <th style="width: 400px;">
                        Penulis
                    </th>
                    <th style="width: 400px;">
                        Penerbit
                    </th>
                    <th style="width: 400px;">
                        Tahun Terbit
                    </th>
                    <th style="width: 400px;">
                        Deskripsi
                    </th>
                    <th style="width: 150px;">
                        Pilihan
                    </th>
                </tr>
                <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT * FROM book LEFT JOIN category on book.kategori_id = category.category_id");
                while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr align="center">
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data['nama']; ?></td> <!-- nama kategori -->
                        <td><?php echo $data['judul'] ?></td>
                        <td><?php echo $data['penulis'] ?></td>
                        <td><?php echo $data['penerbit'] ?></td>
                        <td><?php echo $data['tahun_terbit'] ?></td>
                        <td><?php echo $data['deskripsi'] ?></td>
                        <td>
                            <a href="ubah_book.php?id=<?php echo $data['book_id']; ?>">Ubah</a>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="book_id" value="<?php echo $data['book_id']; ?>">
                                <button type="submit" name="delete_book" onclick="return confirm('Yakin Ingin Menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>

                <?php
                }
                ?>
            </table>

            <?php
            include('tambah_book.php');
            ?>

        </div>
    </div>
</body>

</html>