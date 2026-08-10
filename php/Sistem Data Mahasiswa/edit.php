<?php
include "config/database.php";

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = (int) $_GET['id'];

$query = "SELECT * FROM siswa WHERE id = $id";
$result = mysqli_query($conn, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Data siswa tidak ditemukan.");
}

if (isset($_POST['update'])) {

    $nis = mysqli_real_escape_string($conn, $_POST['nis']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $kelas = mysqli_real_escape_string($conn, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($conn, $_POST['jurusan']);
    $alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

    $query = "UPDATE siswa SET
                nis = '$nis',
                nama = '$nama',
                kelas = '$kelas',
                jurusan = '$jurusan',
                alamat = '$alamat'
              WHERE id = $id";

    if (mysqli_query($conn, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal mengubah data: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="form-container">
    <h1>Edit Data Siswa</h1>

    <form method="POST">

        <label>NIS</label>
        <input type="text"
               name="nis"
               value="<?= htmlspecialchars($data['nis']); ?>"
               required>

        <label>Nama</label>
        <input type="text"
               name="nama"
               value="<?= htmlspecialchars($data['nama']); ?>"
               required>

        <label>Kelas</label>
        <input type="text"
               name="kelas"
               value="<?= htmlspecialchars($data['kelas']); ?>"
               required>

        <label>Jurusan</label>
        <input type="text"
               name="jurusan"
               value="<?= htmlspecialchars($data['jurusan']); ?>"
               required>

        <label>Alamat</label>
        <textarea name="alamat" rows="4" required><?= htmlspecialchars($data['alamat']); ?></textarea>

        <button type="submit" name="update" class="btn simpan">
            Update
        </button>

        <a href="index.php" class="btn kembali">
            Kembali
        </a>

    </form>
</div>

</body>
</html>