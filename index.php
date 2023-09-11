<?php
session_start();
if (isset($_SESSION['user'])) {
    echo "<script> window.location = 'halaman/utama' </script>";
} else {
    echo "<script> window.location = 'halaman/login' </script>";
}
