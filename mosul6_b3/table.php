<?php
require("Koneksi.php");

// Fetch data from the database
$query = "SELECT * FROM anggota ORDER BY id DESC";
$hasil = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        table {
            width: 90%;
            margin-top: 20px;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        table th, table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
        }
        table tr:hover {
            background-color: #f5f5f5;
        }
        a {
            text-decoration: none;
            color: #007BFF;
        }
        .btn {
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #dc3545;
            color: white;
        }
        .btn-primary {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
    <table border="1" cellspacing="0" cellpadding="10">
        <tr>
            <td colspan="12">
                <a href="Main.php" class="btn btn-primary">Tambah data!</a>
            </td>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nama Lengkap</th>
            <th>Nama Panggilan</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Nomor Telepon</th>
            <th>Jurusan</th>
            <th>Agama</th>
            <th>Hobi</th>
            <th>Motivasi</th>
            <th>Foto 3x4</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php
        $i = 1;
        while ($row = mysqli_fetch_assoc($hasil)) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= htmlspecialchars($row['nama_lengkap']); ?></td>
            <td><?= htmlspecialchars($row['nama_panggilan']); ?></td>
            <td><?= htmlspecialchars($row['ttl']); ?></td>
            <td><?= htmlspecialchars($row['jenis_kelamin']); ?></td>
            <td><?= htmlspecialchars($row['notel']); ?></td>
            <td><?= htmlspecialchars($row['jurusan']); ?></td>
            <td><?= htmlspecialchars($row['agama']); ?></td>
            <td><?= htmlspecialchars($row['Hobi']); ?></td>
            <td><?= htmlspecialchars($row['motivasi']); ?></td>
            <td><img src="web/<?= htmlspecialchars($row['foto']); ?>" width="100" alt="Foto"></td>
            <td><a href="Delete.php?id=<?= $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda ingin benar-benar menghapus?')">Hapus</a></td>
            <td><a href="Edit.php?id=<?= $row['id']; ?>" class="btn btn-primary">Edit</a></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
