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
            <a class="navbar-brand">
                Kesehatan Unit
            </a>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="btn bg-white text-primary ms-4">
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
                    $data_unit = query("SELECT * FROM unit");
                    ?>
                    <?php if (!empty($data_unit)) : ?>
                        <?php foreach ($data_unit as $data) : ?>
                            <option value="<?= $data['id'] ?>"><?= $data['nama'] ?></option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>
                <a href="" class="ms-1 btn btn-primary">Tampilkan</a>
                <a href="../unit/create" class="ms-1 btn btn-primary">+</a>
            </div>


            <div class="py-2">
                <table border="1">
                    <tr>
                        <th>Unit</th>
                    </tr>
                    <tr>
                        <td>Common</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>


    <script src="../../assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>