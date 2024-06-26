<?php include("config.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Negeri 1 Lagos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">SMK Negeri 1 Lagos</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index1.php">Home</a>
            <a class="nav-link" href="form-guru.php">Data Guru</a>
        </div>
        </div>
    </div>
    </nav>
    <div class="container mt-4">
    <h2>Data Guru</h2>
    <a class="btn btn-primary" href="form-guru.php" role="button">Tambah Data</a>
    <br><br>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NIK </th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Nama Lengkap</th>
                    <th>Jenis Kelamin</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    $sql = "SELECT * FROM absen";
                    $query = mysqli_query($db, $sql);
                    while($guru = mysqli_fetch_array($query)) {
                        echo "<tr>";
                        echo "<td>".$guru['id']."</td>";
                        echo "<td>".$guru['nik']."</td>";
                        echo "<td>".$guru['username']."</td>";
                        echo "<td>".$guru['password']."</td>";
                        echo "<td>".$guru['nama']."</td>";
                        echo "<td>".$guru['jk']."</td>";
                        echo "<td>
                        <a href='form-guru.php?edit=".$guru['id']."' class='btn btn-warning'>Edit</a>
                        <a href='proses-guru.php?hapus=".$guru['id']. "' class='btn btn-danger'>Delete</a>
                        </td>";
                    echo "</tr>";
                    }
                ?> 
            </tbody>
        </table>
    </div>
                
</body>
</html>    
