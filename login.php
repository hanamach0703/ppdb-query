<?php
include("config.php");

if (isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "Select * from akun where username='$username' && password='$password'";
    $query = mysqli_query($db, $sql);
    $cek = mysqli_num_rows($query);

    if ($cek > 0) {
        header('Location: menu.php');
    } else {
        header('Location: index.php?status=gagal');
    }
}
?>