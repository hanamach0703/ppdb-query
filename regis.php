<?php
include("config.php");

if (isset($_POST['daftar'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jk = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $sekolah = $_POST['sekolah_asal'];

    if(isset($_POST['ubah_foto'])){
        $foto = $_FILES['foto']['name'];
        $tmp = $_FILES['foto']['tmp_name'];

        $fotobaru = date('dmYHis').$foto;
        $path = "images/".$fotobaru;

        if(move_uploaded_file($tmp, $path)){
            $sql = "Insert into calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal, foto) values ('$nama', '$alamat', '$jk', '$agama', '$sekolah', '$fotobaru')";
            $query = mysqli_query($db, $sql);
    
            if ($query) {
                header('Location: menu.php?status=sukses');
            } else {
                header('Location: menu.php?status=gagal');
            }
        } else{
            echo 'alert("Maaf, Gambar gagal untuk diupload")';
            echo "<br><a href='form-daftar.php'>Kembali Ke Form</a>";
        }
    }
    else{
        $sql = "Insert into calon_siswa (nama, alamat, jenis_kelamin, agama, sekolah_asal) values ('$nama', '$alamat', '$jk', '$agama', '$sekolah')";
        $query = mysqli_query($db, $sql);

        if ($query) {
            header('Location: menu.php?status=sukses');
        } else {
            header('Location: menu.php?status=gagal');
        }
    } 
}
else{
    die("Akses dilarang...");
}