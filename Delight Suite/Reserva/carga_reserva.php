<?php 
include "../conect.php";
if ($_POST['cargar']) {
  $dni = $_POST["dni"];
  $nombres = $_POST["nombres"];
  $correo = $_POST["correo"];
  $telefono = $_POST["telefono"];
  //$f_entrada = date_format ( DateTimeInterface $_POST['f_entrada'] , string 'Y-m-d H:i:s');
  //$f_salida = date_format ( DateTimeInterface $_POST['f_salida'] , string 'Y-m-d H:i:s');
  $f_entrada = $_POST["f_entrada"];
  $f_salida = $_POST["f_salida"];
  $tipo_habitacion = $_POST["tipo_habitacion"];
  $tipo_pago = $_POST["tipo_pago"];

  $sql = "INSERT INTO cliente ( dni_cliente,nombre_cliente,telefono_cliente,correo_cliente)";
  $sql = $sql." VALUES ($dni,'$nombres',$telefono,'$correo')";
  $statement=$con->prepare($sql);

  try{
    if ($statement->execute()){
      $sql2 = "INSERT INTO reserva (cod_tipo_pago,cod_estado_reserva,dni_cliente,usuario,cod_habitacion,fecha_entrada_reserva,fecha_salida_reserva)";
      $sql2 = $sql2." VALUES ($tipo_pago, 1, $dni, 'Administrador', $tipo_habitacion, '$f_entrada', '$f_salida')";
      $statement2=$con->prepare($sql2);
      $statement2->execute();

      $mensaje="Reservación Exitosa";
      header("Location:".$_SESSION["URL"]."form_reserva.php?success=done&message=".$mensaje);
    }

  }catch(\Exception $ex){
    header("Location:".$_SESSION["URL"]."form_reserva.php?success=false&message=".$ex->getMessage());
  }
}

?>