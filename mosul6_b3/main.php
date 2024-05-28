<!DOCTYPE html>
<html lang="en">
<head>
    <title>Form Pendaftaran OSIS</title>
</head>
<body>
    <form action="Insert.php" method="post" enctype="multipart/form-data"> 
        <table style="width: 470px; border: 1px solid;" align="center" cellpadding="6" width = "10px">
            <tr>
                <th style="background-color: blue; color: white;" colspan="2">FORM PENDAFTARAN OSIS</th>
            </tr>
            <tr>
                <input type="hidden" name = "id" value = "<?= $id; ?>">
                <td>Nama Lengkap:</td>
                <td><input type="text" name="nama_lengkap" placeholder="Nama Lengkap" required></td>
            </tr>
            <tr>
                <td>Nama Panggilan:</td>
                <td><input type="text" name="nama_panggilan" placeholder="Nama Panggilan"></td>
            </tr>
            <tr>
                <td>Tempat Tanggal Lahir:</td>
                <td><input type="date" name="ttl"></td> 
            </tr>
            <tr>
                <td>Jenis Kelamin:</td>
                <td>
                    Laki-laki<input type="radio" name="jek" value="Laki-laki" id="laki-laki">
                    Perempuan<input type="radio" name="jek" value="Perempuan" id="perempuan">
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon:</td>
                <td><input type="tel" name="nomor_telepon" placeholder="Nomor Telepon"></td>
            </tr>
            <tr>
                <td>Jurusan:</td>
                <td>
                    IPA<input type="radio" name="jurusan" value="IPA"> 
                    IPS<input type="radio" name="jurusan" value="IPS">
                    Bahasa<input type="radio" name="jurusan" value="BAHASA"> 
                </td>
            </tr>
            <tr>
                <td>Agama:</td>
                <td>
                    <select name="agama">
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Budha">Budha</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Hobi:</td>
                <td>
                    <input type="checkbox" name="hobies" value="Membaca_buku">  Membaca Buku
                    <input type="checkbox" name="hobies" value="Menulis"> Menulis
                    <input type="checkbox" name="hobies" value="dll"> dll
                </td>
            </tr>
            <tr>
                <td>Alasan/Motivasi untuk mendaftar:</td>
                <td>
                    <textarea name="alasann" cols="20" rows="3" placeholder="Alasan/Motivasi untuk mendaftar"></textarea>
                </td>
            </tr>
            <tr>
                <td>Foto 3x4:</td>
                <td><input type="file" name="foto" accept=".jpg,. jpeg, .png"></td> 
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="submit" value="Daftar"> 
                    <input type="reset" name = "reset" value="Reset">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>