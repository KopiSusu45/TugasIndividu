<?php

include "../config.php";

if(isset($_POST['save'])){

    if($_POST['save'] == 'add') {
    
        $nama_file = $_FILES['gambar']['name'];
        $ukuran_file = $_FILES['gambar']['size'];
        $tipe_file = $_FILES['gambar']['type'];
        $tmp_file = $_FILES['gambar']['tmp_name'];

        $path = "image/".$nama_file;

        // Proses upload
        if(move_uploaded_file($tmp_file, $path)) {
            // Proses simpan ke Database
            $query = "INSERT INTO gambar (nama, ukuran, tipe) VALUES('".$nama_file."','".$ukuran_file."','".$tipe_file."')";
            $sql = mysqli_query($db, $query);

            if($sql) {
                // Jika Sukses, Lakukan :
                header("location: index2.php"); // Redirect ke halaman data_upload.php
            }else{
                // Jika Gagal, Lakukan :
                echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
                echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
            }
        }else{
            // Jika gambar gagal diupload, Lakukan :
            echo "Maaf, Gambar gagal untuk diupload.";
            echo "<br><a href='form-upload.php'>Kembali Ke Form</a>";
        }
    }
}
if(isset($_GET['hapus'])){

    $id = $_GET['hapus'];

    $sq = "SELECT * FROM gambar WHERE id_gambar='".$id."'";
    $que = mysqli_query($db, $sq);
    $data = mysqli_fetch_array($sq);

    if(is_file("image/".$data['gambar']))
        unlink("image/".$data['gambar']);

    $sql = "DELETE FROM gambar WHERE id_gambar='".$id."'";
    $query = mysqli_query($db, $sql); 

    if($query){
        // ke halaman index dengan status=sukses
        
        header('Location: index2.php?status=sukses');
    }else{
        // ke halaman index dengan status=gagal
        header('Location: index2.php?status=gagal');
    }
}

?>