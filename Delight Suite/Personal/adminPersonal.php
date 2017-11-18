<?php
include "../conect.php";
if (isset($_POST['agregarPersona'])){
    $documento = $_POST['txtDocumento'];
    $tipoEmpleado = $_POST['ddlTipoEmpleado'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $fechaIngreso = $_POST['txtFechaIngreso'];
    $sueldo = $_POST['txtSueldo'];

    $sql = "INSERT INTO empleado ( dni_empleado,cod_tipo_empleado,nombre_empleado,telefono_empleado,direccion_empleado,fecha_ingreso_empleado,sueldo_empleado)";
    $sql = $sql." VALUES ($documento,$tipoEmpleado,'$nombre',$telefono,'$direccion','$fechaIngreso',$sueldo)";
    //echo $sql;
    $statement=$con->prepare($sql);
    try{
        if ($statement->execute()){
            $mensaje="Persona guardada correctamente";
            header("Location:".$_SESSION["URL"]."agregarPersonal.php?success=done&message=".$mensaje);
        }
     }catch(\Exception $ex){
        header("Location:".$_SESSION["URL"]."agregarPersonal.php?success=false&message=".$ex->getMessage());
     }
}
if (isset($_POST['editarPersona'])){
    $documento = $_POST['txtDocumento'];
    $tipoEmpleado = $_POST['ddlTipoEmpleado'];
    $nombre = $_POST['txtNombre'];
    $telefono = $_POST['txtTelefono'];
    $direccion = $_POST['txtDireccion'];
    $fechaIngreso = $_POST['txtFechaIngreso'];
    $fechaSalida = (($_POST['txtFechaSalida']!=null))? ",fecha_salida_empleado='".$_POST['txtFechaSalida']."'":"";
    $sueldo = $_POST['txtSueldo'];
    $codigo = $_POST['txtCodigo'];

    $sql = "UPDATE empleado SET dni_empleado='".$documento."',cod_tipo_empleado='".$tipoEmpleado."',nombre_empleado='".$nombre."',telefono_empleado='".$telefono."',direccion_empleado='".$direccion."',fecha_ingreso_empleado='".$fechaIngreso."',sueldo_empleado='".$sueldo."'".$fechaSalida." WHERE cod_empleado=".$codigo;
    echo $sql;
    $statement=$con->prepare($sql);
    try{
        if ($statement->execute()){
            $mensaje="Persona modificada correctamente";
            header("Location:".$_SESSION["URL"]."agregarPersonal.php?success=done&message=".$mensaje);
        }
    }catch(\Exception $ex){
       header("Location:".$_SESSION["URL"]."editarPersona.php?success=false&message=".$ex->getMessage());
    }


}