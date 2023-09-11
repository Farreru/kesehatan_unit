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
    <link href="../../assets/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="../../assets/css/fontawesome.all.min.css" rel="stylesheet" />

    <title>Halaman Utama</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg sticky-top bg-primary navbar-dark">
        <div class="container">
            <a href="../../index.php" class="navbar-brand">
                Kesehatan Unit
            </a>
            <!-- Add the responsive toggle button here -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <?php if ($_SESSION['user']['role'] == "admin") : ?>
                        <li class="nav-item">
                            <a href="../pengguna" class="nav-link">Data Pengguna</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item ">
                        <a href="../unit" class="nav-link active">Data Unit</a>
                    </li>
                    <li class="nav-item">
                        <a href="../logout" class="btn btn-light ms-1 ">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="p-5">
            <div class="d-flex">
                <h5 class='text-muted'>Data Unit.</h5>
                <a class=" btn btn-primary btn-sm mb-2 ms-auto" href="create">Tambah Unit</a>
            </div>
            <div class="table-responsive">
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID.</th>
                            <th>Nama Unit</th>
                            <th>Tanggal Dibuat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $data_unit = query("SELECT * FROM unit", true);
                        $index = 1;
                        ?>
                        <?php if (!empty($data_unit)) : ?>
                            <?php foreach ($data_unit as $data) : ?>
                                <tr>
                                    <td><?= $index++ ?></td>
                                    <td><?= $data['id'] ?></td>
                                    <td><?= $data['nama'] ?></td>
                                    <td><?= date('d-m-Y', strtotime($data['tanggal'])) ?></td>
                                    <td>
                                        <a href="edit?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="delete?id=<?= $data['id'] ?>" class="btn btn-success btn-sm"><i class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </tbody>
                </table>
            </div>

        </div>
    </div>


    <script src="../../assets/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../../assets/js/jquery-3.7.0.js"></script>
    <script src="../../assets/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/js/dataTables.bootstrap5.min.js"></script>

    <script>
        window.onload = () => {
            new DataTable("#table");
        }
    </script>
</body>

</html>