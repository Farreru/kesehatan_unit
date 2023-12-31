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

    <div class="d-flex align-items-center">
        <img src="../../assets/gambar/logo.png" width="80px" alt="">
        <div class="ms-2">
            <h5 class="text-muted mb-1">PT. PLN Nusantara</h5>
            <span>(Sumatra Utara)</span>
        </div>
    </div>

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
                            <a href="../pengguna" class="nav-link active">Data Pengguna</a>
                        </li>
                    <?php endif; ?>
                    <li class="nav-item">
                        <a href="../unit" class="nav-link">Data Unit</a>
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
            <div class="table-responsive">
                <h5 class='text-muted'>Data Pengguna.</h5>
                <table id="table" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $data_unit = query("SELECT * FROM users WHERE username != 'admin'", true);
                        $index = 1;
                        ?>
                        <?php if (!empty($data_unit)) : ?>
                            <?php foreach ($data_unit as $data) : ?>
                                <tr>
                                    <td><?= $index++ ?></td>
                                    <td><?= $data['username'] ?></td>
                                    <td><?= $data['role'] ?></td>
                                    <td>
                                        <select id="statusSelect" class="form-select form-select-sm">
                                            <?php if ($data['status'] == "aktif") : ?>
                                                <option value="aktif" selected><?= $data['status'] ?></option>
                                                <option value="nonaktif">nonaktif</option>
                                            <?php endif; ?>
                                            <?php if ($data['status'] == "nonaktif") : ?>
                                                <option value="nonaktif" selected><?= $data['status'] ?></option>
                                                <option value="aktif">aktif</option>
                                            <?php endif; ?>
                                        </select>
                                    </td>
                                    <td>
                                        <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
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

    <!-- JavaScript to handle the selection change -->
    <script>
        const statusSelect = document.getElementById('statusSelect');

        statusSelect.addEventListener('change', function() {
            const selectedValue = statusSelect.value;
            const id = <?= $data['id'] ?>; // Replace with the actual ID from your data
            if (selectedValue === 'aktif') {
                window.location.href = `aktivasi.php?id=${id}&status=aktif`;
            } else if (selectedValue === 'nonaktif') {
                window.location.href = `aktivasi.php?id=${id}&status=nonaktif`;
            }
        });
    </script>
</body>

</html>