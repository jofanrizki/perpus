<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    

</head>
<body>
<?php include "navbar.php";
    ?>
<div class="container">
        <form action="tampil_siswa.php" method="post">
            <input type="text" name="cari" class="form-control"
            placeholder="Cari Berdasarkan ID/Nama Siswa" />
        </form>
        <h1 class = "text-center">DATA SISWA</h1>
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                <th scope="col">ID Siswa</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">L/P</th>
                <th scope="col">Kelas</th>


                </tr>
            </thead>
            <tbody>
                <?php 
                include "koneksi.php";
                if (isset($_POST["cari"])) {
                    // if ($_POST['cari] != NULL){ 
                    // jika ada keyword pencarian
                    $cari = $_POST['cari'];
                    $query_siswa = mysqli_query($koneksi, 
                    "select * from siswa where id_siswa='$cari 'or nama_siswa like '%$cari%' ");
                } else {
                    // jika tdk ada keyword pencarian
                    $query_siswa = mysqli_query($koneksi, "select * from siswa");
                }
                while ($data_siswa = mysqli_fetch_array($query_siswa)) {
                ?> 
                    <tr>
                        <td><?php echo $data_siswa["id_siswa"] ?></td>
                        <td><?php echo $data_siswa["nama_siswa"] ?></td>
                        <td><?php echo $data_siswa["tanggal_lahir"] ?></td>
                        <td><?php echo $data_siswa["alamat"] ?></td>
                        <td><?php echo $data_siswa["gender"] ?></td>
                        <td><?php echo $data_siswa["id_kelas"] ?></td>
                        
                    </tr>

                <?php
                }
                ?>
            </tbody>           
        </table>
        <td><a href="tambah_siswa.php" class="btn btn-secondary">Tambah Siswa</a></td>
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</body>


</body>
</html>