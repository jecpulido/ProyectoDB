<?php
include "../menu.php";
include "../conect.php";
?>
<div>
    <div class="container " >
        <br>
        <h1 class="text-center" style="font-weight: bold;">ACTUALIZAR PERSONAL </h1>
        <?php
        if(isset($_REQUEST['cod'])){
        $cod = $_REQUEST['cod'];
        $sql  = 'SELECT cod_empleado, dni_empleado, cod_tipo_empleado, nombre_empleado, telefono_empleado, direccion_empleado, DATE_FORMAT(fecha_ingreso_empleado,\'%Y-%m-%d\') as fecha_ingreso_empleado, DATE_FORMAT(fecha_salida_empleado,\'%Y-%m-%d\') as fecha_salida_empleado, sueldo_empleado FROM empleado WHERE cod_empleado ='.$cod.' ORDER BY 1';
        $statement=$con->prepare($sql);
        if($statement->execute()){
        while ($row = $statement->fetch()){
        ?>

        <form name="form-reg-per" action="adminPersonal.php" method="post" class="container col-8">
            <div class="form-group">
                <hr>
                <h3 class="panel-title">Codigo Empleado: <?php echo $row["cod_empleado"]?></h3>
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="txtDocumento" class="input-group-addon">Documento:</label>
                        <input type="number" class="form-control" name="txtDocumento" id="txtDocumento" value="<?php echo $row["dni_empleado"]?>"  maxlength="999999999999"  required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtNombre" class="input-group-addon">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $row["nombre_empleado"]?>"  maxlength="255" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="ddlTipoEmpleado" class="input-group-addon">Tipo Empleado:</label>
                        <select name="ddlTipoEmpleado" id="ddlTipoEmpleado" class="form-control"  required>
                            <?php
                            $sql  = 'SELECT cod_tipo_empleado,descrip_tipo_empleado FROM tipo_empleado';
                            $statement=$con->prepare($sql);
                            if($statement->execute());
                            echo "<option value='0'>-- Seleccione --</option>";
                            while ($result = $statement->fetch()){
                                $selected = ($result['cod_tipo_empleado']==$row["cod_tipo_empleado"])? 'selected':'';
                                echo "<option value='".$result['cod_tipo_empleado']."' ".$selected.">".$result["descrip_tipo_empleado"]."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtTelefono" class="input-group-addon">Telefono:</label>
                        <input type="number" class="form-control" name="txtTelefono" id="txtTelefono" value="<?php echo $row["telefono_empleado"]?>"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="txtDireccion" class="input-group-addon">Direccion:</label>
                        <input type="text" class="form-control" name="txtDireccion" id="txtDireccion" value="<?php echo $row["direccion_empleado"]?>"  required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtSueldo" class="input-group-addon">Sueldo:</label>
                        <input type="number" class="form-control" name="txtSueldo" id="txtSueldo" value="<?php echo $row["sueldo_empleado"]?>"  required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="txtFechaIngreso" class="input-group-addon">Fecha Ingreso:</label>
                        <input type="date" class="form-control" name="txtFechaIngreso" id="txtFechaIngreso" value="<?php echo $row["fecha_ingreso_empleado"]?>" readonly required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtFechaSalida" class="input-group-addon">Fecha Salida:</label>
                        <input type="date" class="form-control" name="txtFechaSalida" id="txtFechaSalida" value="<?php echo $row["fecha_salida_empleado"]?>" >
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <a href="javascript:history.back()" class="btn btn-danger "> Volver</a>
                        <input type="submit" value="Actualizar" name="editarPersona" class="btn btn-primary">
                    </div>
                    <div class="form-group col-md-6">
                        <input type="number" class="form-control" name="txtCodigo" id="txtCodigo" value="<?php echo $row["cod_empleado"]?>" required hidden>
                    </div>
                </div>

            </div>
        </form>
            <?php
                }
            }
        }
        ?>
    </div>
</div>
<?php include "../pie.php"; ?>
