<?php
include "config/database.php";

$query = mysqli_query($conn, "SELECT * FROM siswa ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<div class="container mt-5">

    <h2 class="mb-4">Data Siswa</h2>

    <a href="tambah.php" class="btn btn-primary mb-3">
        + Tambah Siswa
    </a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIS</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $no = 1;

            while ($data = mysqli_fetch_assoc($query)) {
            ?>

            <tr>
                <td><?= $no++; ?></td>
                <td><?= htmlspecialchars($data['nama']); ?></td>
                <td><?= htmlspecialchars($data['nis']); ?></td>
                <td><?= htmlspecialchars($data['kelas']); ?></td>
                <td><?= htmlspecialchars($data['alamat']); ?></td>

                <td>
                    <a href="edit.php?id=<?= $data['id']; ?>"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <a href="hapus.php?id=<?= $data['id']; ?>"
                       class="btn btn-danger btn-sm"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>