<?php
    $ced = $_POST['cedula'];
    require_once 'funciones/conexiones.php';
    $con = Conectar();
    $sql = "DELETE FROM datospersonales WHERE CEDULA = '$ced'";
    $q = mysql_query($sql, $con);
    
    echo "El estudiante ha sido eliminado satisfactoriamente...".  mysql_error();
    
    
?>
