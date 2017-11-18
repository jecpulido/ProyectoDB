<?php include "../menu.php";
include "../conect.php"; ?>

<div>
	

    <div class="container">
        <br>
        <h1 class="text-center" style="font-weight: bold;">FORMULARIO DE RESERVAS </h1>

       <form class="container col-8" action="carga_reserva.php" method="post" ><hr>
        <div class="form-group">
            
            <h4 class="panel-title">Datos Personales</h4>
            <div class="row">
                <div class="form-group col-md-4">
                    <div class="input-group-addon">Documento</div>
                    <input type="number" class="form-control is-valid" id="" placeholder="N° de Identidad" name="dni"  maxlength="999999999999" required>
                </div>
                <div class="form-group col-md-8">
                    <div class="input-group-addon">Nombre</div>
                    <input type="text" class="form-control is-valid" id="" placeholder="Indique su Nombre" name="nombres" required>
                </div>
            </div>  
            <div class="row">
                <div class="form-group col-md-8">
                    <div class="input-group-addon">Correo</div>
                    <input type="email" class="form-control is-valid" id="" placeholder="Indique su Correo Electronico" name="correo" required>
                    <small id="passwordHelpInline" class="text-muted">
                        <i class="fa fa-envelope-open" aria-hidden="true"></i>
                        Le enviaremos una copia del formulario de reserva completo a su dirección de email.
                    </small>
                </div>
                <div class="form-group col-md-4">
                    <div class="input-group-addon">Telefono</div>
                    <input type="text" class="form-control is-valid" id="" placeholder="Indique N° de Contacto" name="telefono" maxlength="10" required>

                </div>
            </div>

            <h4 class="panel-title">Datos Reserva</h4>
            <div class="row">
                <div class="form-group col-md-6 ">
                    <div class="input-group-addon">Fecha Entrada</div>
                    <input type="datetime-local" class="form-control is-valid" id="inicio" placeholder="Fecha Entrada" name="f_entrada" required>
                </div>
                
                <div class="form-group col-md-6">
                    <div class="input-group-addon">Fecha Salida</div>
                    <input type="datetime-local" class="form-control is-valid" id="fin" placeholder="Fecha Salida"  name="f_salida" required>
                </div>
                
                <div class="form-group col-md-9">
                    <div class="input-group-addon">Tipo de Habitación</div>
                    <select id="inputState" class="form-control custom-select is-valid" name="tipo_habitacion" required>
                        <?php 
                        $sql = "SELECT * FROM tipo_habitacion ORDER BY cod_tipo_habitacion";
                        $statement=$con->prepare($sql);
                        if($statement->execute());
                        echo "<option value='' selected>Seleccionar...</option>";
                        while ($result = $statement->fetch()) {
                           echo "<option value='".$result['cod_tipo_habitacion']."'>".$result['descrip_habitacion']."</option>";
                       }
                       ?> 
                   </select>
               </div>
               <div class="form-group col-md-3">   
                <div class="input-group-addon">Tipo de Pago  </div>
                <select class="custom-select form-control is-valid" id="inlineFormCustomSelect" name="tipo_pago" enchange="submit()" name="tipo_pago" required>
                    <?php 
                    $sql = "SELECT * FROM tipo_pago ORDER BY cod_tipo_pago";
                    $statement=$con->prepare($sql);
                    if($statement->execute()); 
                    echo "<option value='' selected>Seleccionar...</option>";
                    while ($result = $statement->fetch()) {
                        echo "<option value='".$result['cod_tipo_pago']."'>".$result['descrip_tipo_pago']."</option>";
                    }   
                    ?>
                </select>
            </div>
            <div class="form-group col-2">
                <button type="reset" class="form-group btn btn-secondary btn-sm">Limpiar</button>
            </div>

            <div class="container form-group col-6">
                
                <?php include "modal_productos.php"; ?>
            </div>   

        </div>
        
        <input type="submit" name="cargar" class="form-group btn btn-primary btn-lg btn-block active" value="Confirmar Reserva">
    </div>   
    


</form>

</div>

<br><br> 
</div>
<?php include "../pie.php"; ?>   