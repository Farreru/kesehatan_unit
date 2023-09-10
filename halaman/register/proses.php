<?php
require('../../fungsi/fungsiSql.php');
if (isset($_POST['register'])) {
    register($_POST['username'], $_POST['password'], $_POST['role']);
} else {
    echo "<script> window.location = 'index.php' </script>";
}
