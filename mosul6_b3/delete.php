<?php
    include("Koneksi.php");
    $id = $_GET['id'];
    $sql = "DELETE FROM anggota where id = $id";
    if(mysqli_query($con,$sql)){
        ?>
        <script>
            document.location.href = "table.php"
        </script>
        <?php
    }else{
        echo "Data gagal dihapus ".$sql. " ". mysqli_error($con);
    }
?>