<?php
require('../../fungsi/fungsiSql.php');
if (isset($_SESSION['user'])) {
    if ($_SESSION['user']['role'] == 'admin') {
        $id = $_GET['id'];
        query("DELETE FROM users WHERE id='$id'");
        echo "Pengguna Dihapus Berhasil!";
        echo "<script> setInterval(function() { window.location = 'index.php'; }, 3000); </script>";
    }
} else {
    echo "<script> window.location = 'index.php' </script>";
}
