<?php
include "../conect.php";
if (isset($_POST['agregarProducto'])){
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $cantidad = $_POST['txtCantidad'];
    $precio = $_POST['txtPrecio'];

    $permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
    $limite = 1000;

    $sql = "INSERT INTO producto (nombre_producto,descrip_producto,cantidad_producto,precio_producto)";
    $sql = $sql." VALUES ('$nombre','$descripcion',$cantidad,$precio)";
    //echo $sql;
    $statement=$con->prepare($sql);
    try{
        if ($statement->execute()){
            $sql = "SELECT MAX(cod_producto) AS ID FROM producto";
            $statement=$con->prepare($sql);
            $statement->execute();
            while ($result = $statement->fetch()){
                if (in_array($_FILES['foto']['type'], $permitidos) && $_FILES['foto']['size'] <= $limite * 1024) {
                    $ext = explode(".", $_FILES['foto']['name']);
                    $nombref = $result['ID'] . "." . $ext[1];
                    $ruta = "..".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."Productos".DIRECTORY_SEPARATOR.$nombref;
                    move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
                    $sql = "UPDATE producto SET rutafoto_producto='".$nombref."' WHERE cod_producto=".$result['ID'];
                    $statement=$con->prepare($sql);
                    $statement->execute();
                    break;
                }
            }
            $mensaje="Producto guardada correctamente";
            header("Location:".$_SESSION["URL"]."agregarProducto.php?success=done&message=".$mensaje);
        }
    }catch(\Exception $ex){
        header("Location:".$_SESSION["URL"]."agregarProducto.php?success=false&message=".$ex->getMessage());
    }
}
if (isset($_POST['actualizarProducto'])){
    $codigo = $_POST['txtCodigo'];
    $nombre = $_POST['txtNombre'];
    $descripcion = $_POST['txtDescripcion'];
    $cantidad = $_POST['txtCantidad'];
    $precio = $_POST['txtPrecio'];
    $sql = "UPDATE producto SET nombre_producto='".$nombre."',descrip_producto='".$descripcion."',cantidad_producto=$cantidad,precio_producto=$precio WHERE cod_producto=$codigo";
     $statement=$con->prepare($sql);
    try{
        if ($statement->execute()){
            $mensaje="Producto editado correctamente";
            header("Location:".$_SESSION["URL"]."agregarProducto.php?success=done&message=".$mensaje);
        }
    }catch(\Exception $ex){
        header("Location:".$_SESSION["URL"]."editarProducto.php?success=false&message=".$ex->getMessage());
    }
}