<?php
require('../../fungsi/fungsiSql.php');
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="../../assets/gambar/logo.png" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">

    <title>Halaman Utama</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top bg-primary navbar-dark">
        <div class="container">
            <a href="../../index.php" class="navbar-brand">
                Kesehatan Unit
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <?php if ($_SESSION['user']['role'] == "admin") : ?>
                    <li class="nav-item">
                        <a href="../pengguna" class="btn btn-primary me-1">Data Pengguna</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item">
                    <a href="../unit" class="btn btn-primary me-1">Data Unit</a>
                </li>
                <li class="nav-item">
                    <a href="../logout" class="btn bg-white text-primary ">
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="p-5">
            <h5 class='text-muted'>List Unit.</h5>
            <div class="d-flex form-group col-sm-4">
                <select class="form-select" name="unit" id="">
                    <option value="" selected disabled># Pilih Unit</option>
                    <?php
                    $data_unit = query("SELECT * FROM unit", true);
                    ?>
                    <?php if (!empty($data_unit)) : ?>
                        <?php foreach ($data_unit as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <a href="" class="ms-1 btn btn-primary">Tampilkan</a>

            </div>



        </div>
    </div>


    <script src="../../assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>