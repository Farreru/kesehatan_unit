<?php
require('../../fungsi/fungsiSql.php');
if (isset($_POST['login'])) {
    login($_POST['username'], $_POST['password']);
} else {
    echo "<script> window.location = 'index.php' </script>";
}
