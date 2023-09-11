<?php
require('../../fungsi/fungsiSql.php');
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin') {
        // echo "yes you admin";
        $status = $_GET['status'];
        $id = $_GET['id'];
        query("UPDATE users SET status = '$status' WHERE id='$id'");
        echo ucwords($status) . " Berhasil!";
        echo "<script> setInterval(function() { window.location = 'index.php'; }, 3000); </script>";
    }
} else {
    echo "<script> window.location = 'index.php' </script>";
}
