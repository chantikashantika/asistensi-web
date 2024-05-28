<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require("koneksi.php");
if(isset($_POST['submit'])){
    $namaLengkap = $_POST['nama_lengkap'];
    $namaPanggilan = $_POST['nama_panggilan'];
    $ttl = $_POST['ttl'];
    $jurusan = $_POST['jurusan'];
    $agama = $_POST['agama'];
    $hobi = $_POST['hobies'];
    $jk = $_POST['jek'];
    $notel = $_POST['nomor_telepon'];
    $alasan = $_POST['alasann'];

    if($_FILES['foto']['error'] === 4){
        echo "<script> alert('Gambar tidak ada!'); </script>";
    }
    else{
        $fileName = $_FILES['foto']['name'];
        $fileSize = $_FILES['foto']['size'];
        $tmpname = $_FILES['foto']['tmp_name'];
        $validImageExtension = ['jpg','jpeg','png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));

        if(!in_array($imageExtension, $validImageExtension)){
            echo "<script> alert('Invalid input!'); </script>";
        }
        else if($fileSize > 10000000){
            echo "<script> alert('Gambar melebih batas inputan!'); </script>";
        }else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;
            move_uploaded_file($tmpname, 'web/' . $newImageName);
            $q = "INSERT INTO anggota VALUES('', '$namaLengkap', '$namaPanggilan', '$ttl', '$jk', '$notel', '$jurusan', '$agama', '$hobi', '$alasan', '$newImageName')";
            if(mysqli_query($con, $q)){
                echo "<script> 
                        alert('Berhasil mengupload form!');
                        document.location.href ='table.php';
                      </script>";
            } else {
                echo "<script> alert('Database query failed!'); </script>";
            }
        }
    }
}
?>