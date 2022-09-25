<?php 
//File : logout.php
//Deskripsi : untuk logout (menghapus session yang dibuat saat login)
session_start();
if (isset($_SESSION['login'])) {
    unset($_SESSION ['login']);
    session_destroy();
}

header('Location: login.php');
?>