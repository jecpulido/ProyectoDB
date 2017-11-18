<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Deligth</title>
</head>
<body>
	<?php include "menu.php"; ?><br>
    <?php include "conect.php"; ?>
    <br><br>
    <div class="container">

     <h1 class="text-center" style="font-weight: bold;"><img src="images/logo.png" width="80" height="80" class="" alt=""> Formulario de Reservas </h1>


     <form class="container  col-8" method="POST">
        <div class="form-group">
            <label class="col-form-label" for="formGroupExampleInput" id="label">Datos Personales</label>
            
            <div class="row">
                <div class="form-group col-md-6">
                    <div class="input-group-addon">Nombres</div>
                    <input type="text" class="form-control is-valid" id="" placeholder="Indique sus Nombres">
                </div>
                <div class="form-group col-md-6">
                    <div class="input-group-addon">Apellidos</div>
                    <input type="text" class="form-control is-valid" id="" placeholder="Indique sus Apellidos">
                </div>
            </div>  
            <div class="row">
                <div class="form-group col-md-8">
                    <div class="input-group-addon">Correo</div>
                    <input type="email" class="form-control is-valid" id="" placeholder="Indique su Correo Electronico">
                    <small id="passwordHelpInline" class="text-muted">
                        <i class="fa fa-envelope-open" aria-hidden="true"></i>
                        Le enviaremos una copia del formulario de reserva completo a su dirección de email.
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <div class="input-group-addon">Telefono</div>
                    <input type="text" class="form-control is-valid" id="" placeholder="Indique N° de Contacto">

                </div>
                <br>
            </div>

            <label class="col-form-label" for="formGroupExampleInput" id="label">Datos Reserva</label>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <div class="input-group-addon">Fecha Entrada</div>
                    <input type="datetime-local" class="form-control is-valid" id="" placeholder="Fecha Entrada">
                </div>
                
                <div class="form-group col-md-6">
                    <div class="input-group-addon">Fecha Salida</div>
                    <input type="datetime-local" class="form-control is is-valid" id="" placeholder="Fecha Salida">
                </div>
                
                <div class="form-group col-md-9">
                    <div class="input-group-addon">Tipo de Habitación</div>
                    <select id="inputState" class="form-control custom-select    is-valid">
                        <option value="" selected>Seleccionar...</option>
                        <?php
                        $sql = "SELECT * FROM tipo_habitacion ORDER BY cod_tipo_habitacion";
                        $statement=$con->prepare($sql);
                        if($statement->execute());
                        while ($result = $statement->fetch()){
                            echo "<option value='$result[0]'>$result[1]</option>";
                        }
                        /*$sql = "SELECT * FROM tipo_habitacion ORDER BY cod_tipo_habitacion";
                        $res = mysql_query($sql);
                        while ($fila=mysql_fetch_row($res)) {
                            echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                        }*/
                        ?> 
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <div class="input-group-addon">Tipo de Pago  </div>
                    <select class="custom-select form-control is-valid" id="inlineFormCustomSelect" name="tipo_pago" enchange="submit()">
                        <option value="" selected>Seleccionar...</option>
                        <?php
                        $sql = "SELECT * FROM tipo_pago ORDER BY cod_tipo_pago";
                        $statement=$con->prepare($sql);
                        if($statement->execute());
                        while ($result = $statement->fetch()){
                            echo "<option value='$result[0]'>$result[1]</option>";
                        }
                        /*$sql = "SELECT * FROM tipo_pago ORDER BY cod_tipo_pago";
                        $res = mysql_query($sql);
                        while ($fila=mysql_fetch_row($res)) {
                            echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                        } */
                        ?>
                    </select>
                </div>

                <div class="form-group col-12">
                   <label for="exampleFormControlSelect2" class="input-group-addon">Productos & Servicios Adicionales</label>
                   <select multiple class="form-control" id="exampleFormControlSelect2">
                     <option>Whiskey</option>
                     <option>Cerveza</option>
                     <option>Aromas</option>
                     <option>Cena Romantica</option>
                     <option>Parqueadero</option>
                 </select>
                 <small id="passwordHelpInline" class="text-muted">
                    Si desea seleccionar varios articulos, utilice Ctrl + <i class="fa fa-mouse-pointer" aria-hidden="true"></i>.
                </small>
            </div>   

        </div>
        <button type="reset" class="form-group btn btn-secondary btn-sm">Limpiar</button>
    </div>   

    <button type="button" class="form-group btn btn-primary btn-lg btn-block active">Confirmar Reserva</button>

</form>

</div>

<br><br><br>
<?php include "pie.php"; ?>     
</body>
</html>