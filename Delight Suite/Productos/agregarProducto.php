<?php
include "../template/menu.php";
include "../template/conect.php";
?>
<div>
    <div class="container " >
        <br>
        <h1 class="text-center" style="font-weight: bold;">ADMINISTRACIÓN PRODUCTO </h1>
        <form name="form-reg-per" action="adminProducto.php" method="POST" class="container col-8" enctype="multipart/form-data">
            <div class="form-group">
                <hr>
                <h3 class="panel-title">Agregar Producto</h3>
                <br>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="txtNombre" class="input-group-addon">Nombre:</label>
                        <input type="text" class="form-control" name="txtNombre" id="txtNombre" placeholder="Nombre Producto" maxlength="255" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtDescripcion" class="input-group-addon">Descripcion:</label>
                        <input type="text" class="form-control" name="txtDescripcion" id="txtDescripcion" placeholder="Descripcion Producto" maxlength="999999999999" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="txtCantidad" class="input-group-addon">Cantidad:</label>
                        <input type="number" class="form-control" name="txtCantidad" id="txtCantidad" placeholder="Cantidad" maxlength="999999999999" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="txtPrecio" class="input-group-addon">Precio:</label>
                        <input type="number" class="form-control" name="txtPrecio" id="txtPrecio" placeholder="Precio Unitario" maxlength="999999999999" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label for="foto" class="input-group-addon">Imagen:</label>
                        <input type="file" class="form-control" name="foto" id="foto" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <input type="reset" value="Limpiar" class="btn btn-dark">
                        <input type="submit" value="Registrar" name="agregarProducto" class="btn btn-primary">
                    </div>
                    <div class="form-group col-md-6">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <form name="form-reg-per" action="adminProducto.php" method="post" class="container col-8">
        <div class="form-group">
            <hr>
            <div class="panel panel-primary table-responsive" style="width: 100%" >
                <div class="panel-heading" style="width: 100%">
                    <h3 class="panel-title">Lista Productos</h3>
                </div>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>IMAGEN</th>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sql  = 'SELECT cod_producto,nombre_producto,descrip_producto,cantidad_producto,precio_producto,rutafoto_producto FROM producto ORDER BY 1';
                    $statement=$con->prepare($sql);
                    if($statement->execute());
                    while ($row = $statement->fetch()){
                        ?>
                        <tr>
                            <td><img class="imagen-avatar" width="50px" height="50px" alt="<?php echo $row['cod_producto']; ?>" src="<?php echo $_SESSION["URL"]; ?>images/Productos/<?php echo $row['rutafoto_producto']; ?>"></td>
                            <td><?php echo $row['cod_producto']; ?></td>
                            <td><?php echo $row['nombre_producto']; ?></td>
                            <td><?php echo $row['descrip_producto']; ?></td>
                            <td><?php echo $row['cantidad_producto']; ?></td>
                            <td><?php echo $row['precio_producto']; ?></td>
                            <td><a class="btn btn-danger" href="<?php echo $_SESSION["URL"]; ?>Productos/editarProducto.php?cod=<?php echo $row['cod_producto']; ?>">Editar</a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
</div>
<?php include "../pie.php"; ?>
