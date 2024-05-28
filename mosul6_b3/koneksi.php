<?php
try{
    $con = new mysqli("localhost","root","","200modul6");
}catch(mysqli_sql_exception $e)
{
    echo "". $e->getMessage() ."";
}
?>