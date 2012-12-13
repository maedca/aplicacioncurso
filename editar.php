<?php
require_once 'funciones/conexiones.php';
$ced = $_POST['txtCedula'];
$nom = $_POST['txtNombres'];
$apel = $_POST['txtApellidos'];
$nac = $_POST['txtFechaNac'];
$tel = $_POST['txtTel'];
$dir = $_POST['txtDir'];

    $con = Conectar();
    $sql = "UPDATE datospersonales SET NOMBRES = '$nom', APELLIDOS = '$apel', FECHA_NAC = '$nac', TEL = '$tel', DIR = '$dir' WHERE CEDULA = '$ced'";
    $q = mysql_query($sql, $con);
    if(!$q)
    {
        echo "Ha ocurrido un error en el procesamiento de la informacion". $sql;
    }
    else
    {
        echo "El estudiante ha sido actualizado satisfactoriamente...";
    }
?>
