<?php
require('../../../fungsi/fungsiSql.php');
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    query("INSERT into unit(nama, tanggal) VALUES ('$nama','$tanggal')");
    echo "Berhasil Ditambahkan!";
    echo "<script> setInterval(function() { window.location = '../../utama'; }, 3000); </script>";
} else {
    echo "<script> window.location = 'index.php' </script>";
}
