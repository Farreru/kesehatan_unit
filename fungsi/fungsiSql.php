<?php
session_start();
require('koneksi.php');

function register($username, $password, $role)
{

    global $koneksi;

    if (mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' LIMIT 1"))) {
        echo "Username telah diambil!";
        echo "<script> setInterval(function() { window.location = 'index.php'; }, 3000); </script>";
        return false;
    }

    $sql = mysqli_query($koneksi, "INSERT into users(username,password,role) VALUE('$username', md5('$password'), '$role')");
    if (!$sql) {
        echo 'Gagal Registrasi';
        echo "<script> window.location = 'index.php' </script>";
        return false;
    } else {
        echo 'Berhasil Registrasi';
        echo "<script> window.location = '../login/index.php' </script>";
        return false;
    }
}

function login($username, $password)
{
    global $koneksi;

    $sql = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM users WHERE username = '$username' AND password = md5('$password') LIMIT 1"));

    if ($sql['status'] == 'aktif') {
        $_SESSION['user'] = $sql;
        echo "<script> window.location = '../utama/index.php?alert=welcome' </script>";
        return false;
    } else {
        echo "Silahkan Hubungi Admin Untuk Melakukan Aktivasi Akun!";
        echo "<script> setInterval(function() { window.location = 'index.php'; }, 3000); </script>";
        return false;
    }
}

function query($query)
{
    global $koneksi;

    $result = mysqli_query($koneksi, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($koneksi));
    }

    $data = array(); // Initialize an array to store the results

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row; // Append each row to the data array
    }

    return $data; // Return the array of results
}
