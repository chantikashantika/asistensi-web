<?php
include("Koneksi.php");

if (isset($_POST['id']) && isset($_POST['nama_lengkap']) && isset($_POST['nama_panggilan']) && isset($_POST['ttl']) && 
    isset($_POST['jurusan']) && isset($_POST['agama']) && isset($_POST['hobies']) && isset($_POST['jek']) && 
    isset($_POST['nomor_telepon']) && isset($_POST['alasann'])) {

    $id = $_POST['id'];
    $namaLengkap = $_POST['nama_lengkap'];
    $namaPanggilan = $_POST['nama_panggilan'];
    $ttl = $_POST['ttl'];
    $jurusan = $_POST['jurusan'];
    $agama = $_POST['agama'];
    $hobies = implode(', ', $_POST['hobies']);
    $jk = $_POST['jek'];
    $notel = $_POST['nomor_telepon'];
    $alasan = $_POST['alasann'];

    if ($_FILES['foto']['error'] === 4) {
        $sql = "UPDATE anggota SET 
                nama_lengkap = '$namaLengkap', 
                nama_panggilan = '$namaPanggilan', 
                ttl = '$ttl', 
                jenis_kelamin = '$jk', 
                notel = '$notel', 
                jurusan = '$jurusan', 
                agama = '$agama', 
                hobi = '$hobies', 
                motivasi = '$alasan' 
                WHERE id = '$id'";
    } else {
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $tmpname = $_FILES['foto']['tmp_name'];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if (!in_array($imageExtension, $validImageExtension)) {
            echo "<script> alert('Invalid input!'); </script>";
            exit;
        } else if ($fileSize > 10000000) {
            echo "<script> alert('Gambar melebihi batas inputan!'); </script>";
            exit;
        } else {
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpname, 'web/' . $newImageName);

            $sql = "UPDATE anggota SET 
                    nama_lengkap = '$namaLengkap', 
                    nama_panggilan = '$namaPanggilan', 
                    ttl = '$ttl', 
                    jenis_kelamin = '$jk', 
                    notel = '$notel', 
                    jurusan = '$jurusan', 
                    agama = '$agama', 
                    hobi = '$hobies', 
                    motivasi = '$alasan', 
                    foto = '$newImageName' 
                    WHERE id = '$id'";
        }
    }

    if (mysqli_query($con, $sql)) {
        echo "<script> 
                alert('Berhasil mengupload form!');
                document.location.href ='table.php';
              </script>";
    } else {
        echo "<script> alert('Database query Gagal!'); </script>";
    }
} else {
    echo "<script> alert('Mohon jangan kosongkan!'); </script>";
}
?>