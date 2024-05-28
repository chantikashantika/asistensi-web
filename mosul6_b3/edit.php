<?php
include("Koneksi.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($con, "SELECT * FROM anggota WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $hobbies = isset($row['hobi']) ? explode(', ', $row['hobi']) : [];
    } else {
        echo "Data not found.";
        exit;
    }
} else {
    echo "ID is missing.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Pendaftaran OSIS</title>
</head>
<body>
    <form action="update.php" method="post" enctype="multipart/form-data"> 
        <table style="width: 470px; border: 1px solid;" align="center" cellpadding="6" width="10px">
            <tr>
                <th style="background-color: blue; color: white;" colspan="2">FORM PENDAFTARAN OSIS</th>
            </tr>
            <tr>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                <td>Nama Lengkap:</td>
                <td><input type="text" name="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $row['nama_lengkap']; ?>" required></td>
            </tr>
            <tr>
                <td>Nama Panggilan:</td>
                <td><input type="text" name="nama_panggilan" placeholder="Nama Panggilan" value="<?php echo $row['nama_panggilan']; ?>"></td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir:</td>
                <td><input type="date" name="ttl" value="<?php echo $row['ttl']; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    <input type="radio" name="jek" value="Laki-laki" <?php if ($row['jenis_kelamin'] == 'Laki-laki') echo 'checked'; ?>> Laki-laki
                    <input type="radio" name="jek" value="Perempuan" <?php if ($row['jenis_kelamin'] == 'Perempuan') echo 'checked'; ?>> Perempuan
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon:</td>
                <td><input type="tel" name="nomor_telepon" placeholder="Nomor Telepon" value="<?php echo $row['notel']; ?>"></td>
            </tr>
            <tr>
                <td>Jurusan:</td>
                <td>
                    <input type="radio" name="jurusan" value="IPA" <?php if ($row['jurusan'] == 'IPA') echo 'checked'; ?>> IPA
                    <input type="radio" name="jurusan" value="IPS" <?php if ($row['jurusan'] == 'IPS') echo 'checked'; ?>> IPS
                    <input type="radio" name="jurusan" value="BAHASA" <?php if ($row['jurusan'] == 'BAHASA') echo 'checked'; ?>> Bahasa
                </td>
            </tr>
            <tr>
                <td>Agama:</td>
                <td>
                    <select name="agama">
                        <option value="Islam" <?php if ($row['agama'] == 'Islam') echo 'selected'; ?>>Islam</option>
                        <option value="Kristen" <?php if ($row['agama'] == 'Kristen') echo 'selected'; ?>>Kristen</option>
                        <option value="Hindu" <?php if ($row['agama'] == 'Hindu') echo 'selected'; ?>>Hindu</option>
                        <option value="Budha" <?php if ($row['agama'] == 'Budha') echo 'selected'; ?>>Budha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobi:</td>
                <td>
                    <input type="checkbox" name="hobies[]" value="Membaca_buku" <?php if (in_array('Membaca_buku', $hobbies)) echo 'checked'; ?>> Membaca Buku
                    <input type="checkbox" name="hobies[]" value="Menulis" <?php if (in_array('Menulis', $hobbies)) echo 'checked'; ?>> Menulis
                    <input type="checkbox" name="hobies[]" value="dll" <?php if (in_array('dll', $hobbies)) echo 'checked'; ?>> dll
                </td>
            </tr>
            <tr>
                <td>Alasan/Motivasi untuk mendaftar:</td>
                <td>
                    <textarea name="alasann" cols="20" rows="3" placeholder="Alasan/Motivasi untuk mendaftar"><?php echo $row['motivasi']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td>Foto 3x4:</td>
                <td><input type="file" name="foto" accept=".jpg, .jpeg, .png"></td> 
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Daftar"> 
                    <input type="reset" name="reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>