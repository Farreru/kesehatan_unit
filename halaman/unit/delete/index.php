<?php
require('../../../fungsi/fungsiSql.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    query("DELETE FROM unit WHERE id = '$id'");
    echo "Berhasil Dihapus!";
    echo "<script> setInterval(function() { window.location = '../'; }, 3000); </script>";
} else {
    echo "<script> window.location = 'index.php' </script>";
}
