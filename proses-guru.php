<?php 

include("config.php");

    if(isset($_POST['aksi'])){

        if($_POST['aksi']=='add'){
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $sql = "INSERT INTO absen (nik, nama, jk, username, password)
             VALUE ('$nik','$nama','$jk','$username','$password')";
             $query= mysqli_query($db, $sql);
        
            //  apakah queri berhasil disimpan
             if($query){
                // ke halaman index dengan status=sukses
                header('Location: index1.php?status=sukses');
            }else {
                // ke halaman index dengan status=gagal
                header('Location: index1.php?status=gagal');
            }
        }else if($_POST['aksi'] == 'edit'){
            $id = $_POST['id'];
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $username = $_POST['username'];
            $password = $_POST['password'];
    
            // buat queri
            $sql = "UPDATE absen SET nik='$nik',nama='$nama',jk='$jk',username='$username',password='$password' WHERE id='$id';";
            $query= mysqli_query($db, $sql);
    
            //  apakah queri berhasil disimpan
            if($query){
                // ke halaman index dengan status=sukses
                header('Location: index1.php?status=sukses');
            }else {
                // ke halaman index dengan status=gagal
                header('Location: index1.php?status=gagal');
            }
        }
    }
    if(isset($_GET['hapus'])){

        $id = $_GET['hapus'];
    
        $sql = "DELETE FROM absen WHERE id='$id';";
        $query = mysqli_query($db, $sql);
    
        if($query){
            // ke halaman index dengan status=sukses
            header('Location: index1.php?status=sukses');
        }else{
            // ke halaman index dengan status=gagal
            header('Location: index1.php?status=gagal');
        }
    }
?>
