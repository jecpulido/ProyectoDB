<?php
include "../menu.php";
include "../conect.php";
?>
    <div>
        <div class="container " >
            <br>
            <h1 class="text-center" style="font-weight: bold;">EDITAR PRODUCTO </h1>

            <?php
            if(isset($_REQUEST['cod'])){
                $cod = $_REQUEST['cod'];
                $sql  = 'SELECT cod_producto,nombre_producto,descrip_producto,cantidad_producto,precio_producto FROM producto WHERE cod_producto ='.$cod.' ORDER BY 1';
                $statement=$con->prepare($sql);
                if($statement->execute()){
                    while ($row = $statement->fetch()){
            ?>

            <form name="form-reg-per" action="adminProducto.php" method="post" class="container col-8">
                <div class="form-group">
                    <hr>
                    <h3 class="panel-title">Codigo Producto: <?php echo $row["cod_producto"]?></h3>
                    <br>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre" class="input-group-addon">Nombre:</label>
                            <input type="text" class="form-control" name="txtNombre" id="txtNombre" value="<?php echo $row["nombre_producto"]?>" maxlength="255" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtDescripcion" class="input-group-addon">Descripcion:</label>
                            <input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" value="<?php echo $row["descrip_producto"]?>" maxlength="999999999999" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="txtCantidad" class="input-group-addon">Cantidad:</label>
                            <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" value="<?php echo $row["cantidad_producto"]?>" maxlength="999999999999" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtPrecio" class="input-group-addon">Precio:</label>
                            <input type="number" class="form-control" name="txtPrecio" id="txtPrecio" value="<?php echo $row["precio_producto"]?>" maxlength="999999999999" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <a href="javascript:history.back()" class="btn btn-danger "> Volver</a>
                            <input type="submit" value="Actualizar" name="actualizarProducto" class="btn btn-primary">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="number" class="form-control" name="txtCodigo" id="txtCodigo" value="<?php echo $row["cod_producto"]?>" required hidden>
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