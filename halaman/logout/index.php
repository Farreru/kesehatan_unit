<?php

session_start();
session_destroy();

echo "<script>window.location = '../login/index.php' </script>";
return false;
