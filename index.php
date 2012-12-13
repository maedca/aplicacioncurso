<?php
    require_once 'funciones/conexiones.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=latin1">
        <title></title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
        
        <style type="text/css" title="currentStyle">
            @import "css/demo_page.css";
            @import "css/demo_table.css";
	</style>
        <script type="text/javascript">
            var procedimiento = "nuevo";
            $(document).ready(function(){
                
                var num = 1;
                $("#loader").hide();
                $("#formularioRegistrar").hide();
                $('#tabla').dataTable();
                
                $("#btnNuevo").click(function(){
                    $("#leyenda").html("Registrar Nuevo Estudiante");
                    procedimiento = "nuevo";
                    num = num + 1;
                    if(num % 2 == 0)
                    {
                         $("#formularioRegistrar").show();
                         $("#btnNuevo").val("Cancelar");
                         
                    }
                    else
                    {
                        $("#formularioRegistrar").hide();
                        $("#btnNuevo").val("Agregar Nuevo Estudiante");
                    }
                })
                
                $("#btnProcesar").click(function(){
                    $("#loader").show();
                    var datos = $("#frmRegistrar").serialize();
                    
                    if(procedimiento == "nuevo")
                    {
                        $.ajax({
                        url: "guardar.php",
                        type: "POST",
                        data: datos,
                        success:
                            function(r)
                            {
                                alert(r);
                                $("#loader").hide();
                                location.reload(true);
                            }
                        })
                    }
                    else if(procedimiento == "editar")
                    {
                        $.ajax({
                        url: "editar.php",
                        type: "POST",
                        data: datos,
                        success:
                            function(r)
                            {
                                alert(r);
                                $("#loader").hide();
                                location.reload(true);
                            }
                    })
                    }
                })
            });
            
            function eliminar(cedula)
            {
                if(confirm("Esta seguro que desea eliminar este estudiante?"))
                {
                    //cedula=85150447
                    var ced = "cedula="+cedula;                    
                    $.ajax({
                        url:"eliminar.php",
                        data: ced,
                        type: "POST",
                        success:
                            function(respuesta)
                            {
                                alert(respuesta);
                                location.reload(true);
                            }                        
                    })
                }
            }
            
            function editar(cedula)
            {
                $("#leyenda").html("Actulizar Estudiante");
                procedimiento = "editar";
                var ced = "cedula="+cedula;                    
                    $.ajax({
                        url:"buscarestudiante.php",
                        data: ced,
                        type: "POST",
                        dataType: "json",
                        success:
                            function(respuesta)
                            {
                                $("#formularioRegistrar").show();
                                $("#btnNuevo").val("Cancelar");
                                $("#txtCedula").val(respuesta.ced);
                                $("#txtNombres").val(respuesta.nom);
                                $("#txtApellidos").val(respuesta.apel);
                                $("#txtFechaNac").val(respuesta.fn);
                                $("#txtTel").val(respuesta.tel);
                                $("#txtDir").val(respuesta.dir);
                            }                        
                    })
            }
        </script>
        
    </head>
    <body>
        <table cellpadding="0" cellspacing="0" border="0" class="display" id="tabla">
	<thead>
		<tr>
			<th>Cedula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Fecha Nacimiento</th>
			<th>Telefono</th>
                        <th>Direccion</th>
                        <th></th>
		</tr>
	</thead>
	<tbody>
            <?php
            $con = Conectar();
            $sql = "SELECT CEDULA, NOMBRES, APELLIDOS, FECHA_NAC, TEL, DIR FROM datospersonales ORDER BY NOMBRES, APELLIDOS";
            $q = mysql_query($sql, $con) or die ("Problemas al ejecutar la consulta");                
        ?>
            <?php
            while($datos = mysql_fetch_array($q))
            {
            ?>
		<tr class="odd gradeX">
			<td><?php echo $datos['CEDULA']; ?></td>
			<td><?php echo $datos['NOMBRES']; ?></td>
			<td><?php echo $datos['APELLIDOS']; ?></td>
			<td><?php echo $datos['FECHA_NAC']; ?></td>
			<td><?php echo $datos['TEL']; ?></td>
                        <td><?php echo $datos['DIR']; ?></td>
                        <td>
                            <img src="images/refresh.png" style="cursor: pointer;" onclick="editar('<?php echo $datos['CEDULA']; ?>')" />
                            <img src="images/delete.png" style="cursor: pointer;" onclick="eliminar('<?php echo $datos['CEDULA']; ?>')" />
                        </td>
		</tr>
            <?php
            }
            ?>
	</tbody>
	<tfoot>
		<tr>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
			<th></th>
                        <th></th>
                        <th></th>
		</tr>
	</tfoot>
</table>
        <div id="botonNuevo" align="center">
            <input type="button" id="btnNuevo" name="btnNuevo" value="Agregar Nuevo Estudiante" />
        </div>
        <br />
        <div id="formularioRegistrar" align="center">
            <div id="procedimiento"></div>
            <form name="frmRegistrar" id="frmRegistrar">
                <fieldset style="display: inline;">
                    <legend id="leyenda">Registrar Nuevo Estudiante</legend>   
                <table>
                    <tr>
                        <td>Cedula : </td>
                        <td>
                            <input type="text" id="txtCedula" name="txtCedula" />
                        </td>
                    </tr>
                    <tr>
                        <td>Nombres : </td>
                        <td>
                            <input type="text" id="txtNombres" name="txtNombres" />
                        </td>
                    </tr> 
                    <tr>
                        <td>Apellidos : </td>
                        <td>
                            <input type="text" id="txtApellidos" name="txtApellidos" />
                        </td>
                    </tr> 
                    <tr>
                        <td>Fecha de Nacimiento : </td>
                        <td>
                            <input type="text" id="txtFechaNac" name="txtFechaNac" />
                        </td>
                    </tr> 
                    <tr>
                        <td>Telefono : </td>
                        <td>
                            <input type="text" id="txtTel" name="txtTel" />
                        </td>
                    </tr> 
                    <tr>
                        <td>Direcci&oacute;n : </td>
                        <td>
                            <input type="text" id="txtDir" name="txtDir" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="button" id="btnProcesar" name="btnProcesar" value="Procesar Estudiante" />
                        </td>
                        <td>
                            <input type="reset" name="btnBorrar" id="btnBorrar" value="Borrar Formulario" />
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <div id="loader">
                                <img src="images/loader.gif" />
                            </div>
                        </td>
                    </tr>
                </table> 
                </fieldset>
            </form>
                
        </div>       
    </body>
</html>
