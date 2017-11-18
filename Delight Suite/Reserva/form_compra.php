<?php include "../conect.php"; ?>
<form action="">
	<h5 class="text-center" style="font-weight: bold;">Listado de Productos</h5>
	<table class="table" >
		<thead>
			<tr>
				<th></th>
				<th scope="col">Nombre Producto</th>
				<th scope="col">Cantidad</th>
			</tr>
		</thead>


		<?php 
		$sql = "SELECT * FROM producto ORDER BY nombre_producto";
		$statement=$con->prepare($sql);
		if($statement->execute()); 

		while ($result = $statement->fetch()) {
			echo "<tr scope='row'>
					<td><img class='imagen-avatar' width='20px' height='20px' alt='' src='../images/Productos/'".$result['rutafoto_producto']."'></td>
					<td class=''><input class='form-check-input text-center' type='radio' name='exampleRadios' id='exampleRadios1' style='font-size: 10px;' value='".$result['cod_producto']."'>".$result['nombre_producto']."</td>";
			echo "<td class=''><input type='number' name='cantidad'></td></tr>";
		}   
		?>
		
	</table>
	
</form>