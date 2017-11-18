	<?php include "../menu.php"; ?>
	<div class="container-fluid">
        <h1 class="text-center" style="font-weight: bold;">CATALOGO DE HABITACIONES</h1><hr>
	<div class="card-group container-fluid">

		

		<div class="col-6">
			<div class="card  text-white bg-dark" style="width: 38rem; height: 30rem; margin: auto;">
				<br>
				<img class="card-img-top" src="../images/habitaciones/hab01.jpg" alt="Card image cap" id="img" style="width: 90%; height: 50%; margin:auto;">
				<div class="card-body">
					<h4 class="card-title">Card title</h4>
					<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					<button type="button" class="btn btn-dm btn-success active col-12" data-toggle="popover" title="¡Fabuloso!" data-content="Esta habitación se añadio a tus favoritas.">Echar un Vistazo<i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
				</div>
			</div>
			
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