<?php
require_once 'funciones/conexiones.php';
$ced = $_POST['txtCedula'];
$nom = $_POST['txtNombres'];
$apel = $_POST['txtApellidos'];
$nac = $_POST['txtFechaNac'];
$tel = $_POST['txtTel'];
$dir = $_POST['txtDir'];

    $con = Conectar();
    $sql = "INSERT INTO datospersonales (CEDULA, NOMBRES, APELLIDOS, FECHA_NAC, TEL, DIR) VALUES ('$ced', '$nom', '$apel', '$nac', '$tel', '$dir')";
    $q = mysql_query($sql, $con);
    if(!$q)
    {
        echo "Ha ocurrido un error en el procesamiento de la informacion";
    }
    else
    {
        echo "El estudiante ha sido almacenado satisfactoriamente...";
    }
    
    
?>
