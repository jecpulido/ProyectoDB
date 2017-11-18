<?php include "../menu.php";
include "../conect.php";
?>
<div>
	<div class="container">
		<h1 class="text-center" style="font-weight: bold;">CATALOGO DE PRODUCTOS</h1><hr>
		<div class="row">

			<?php
			$sql  = 'SELECT cod_producto,nombre_producto,descrip_producto,cantidad_producto,precio_producto,rutafoto_producto FROM producto ORDER BY 1';
			$statement=$con->prepare($sql);
			if($statement->execute());
			while ($row = $statement->fetch()){
				?>

				<div class="card-group" style="margin: auto;">
					<div class="card bg-dark text-white mb-4 mr-2" style="width: 20rem;"><br>
						<img class="card-img-top" style="width: 200px; height: 200px; margin: auto;" src="<?php echo $_SESSION["URL"]; ?>images/Productos/<?php echo $row['rutafoto_producto']; ?>" alt="Card image cap">
						<div class="card-body">
							<h4 class="card-title"><?php echo $row['nombre_producto']; ?></h4>
							<p class="card-text"><?php echo $row['descrip_producto']; ?>.</p>
							<button type="button" class="btn btn-sm btn-danger col-12" data-toggle="popover" title="Buena Elección" data-content="Producto añadido a la Reserva.">Adquirir <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>

						</div>

					</div>

				</div>
				<?php } ?>		
			</div>
			
		</div>

		<br><br>

		<script>
			$(function () {
			  $('[data-toggle="popover"]').popover()
			})
		</script>
	</div>

	<?php include "../pie.php"; ?>