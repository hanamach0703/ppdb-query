<?php
include("config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "Select * from calon_siswa Where id=$id";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_array($query);

    if(is_file("images/".$data['foto'])){
        unlink("images/".$data['foto']);
    }

    $sql2 = "Delete from calon_siswa Where id=$id";
    $query2 = mysqli_query($db, $sql2);

    if ($query2) {
        echo 'alert("Penghapusan data berhasil!")';
        header('Location: list-siswa.php');
    } else {
        die("Gagal menghapus...");
    }
} else {
    die("Akses Dilarang...");
}