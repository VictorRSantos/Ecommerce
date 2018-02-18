<table width="795" align="center" bgcolor="#708090">
	<tr align="center">			
		<td colspan="6"><h2>Visualizar Todas Marcas aqui!</h2></td>
	</tr>

	<tr align="center" bgcolor="white">
		<th>ID Marca</th>
		<th>Nome Marca</th>
		<th>Editar</th>
		<th>Apagar</th>
	</tr>

	<?php
	include("includes/db.php");

	$get_marca ="SELECT * FROM marcas ORDER BY marca_nome";

	$run_marca = mysqli_query($con,$get_marca);

	$i = 0;

	while ($row_marca=mysqli_fetch_array($run_marca)){

		$marca_id = $row_marca['marca_id'];	
		$marca_nome = $row_marca['marca_nome'];		
		$i++;		

		?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $marca_nome;?></td>		
		<td><a href="index.php?edit_marca=<?php echo $marca_id; ?>">Editar</a></td>
		<td><a href="delete_marca.php?delete_marca=<?php echo $marca_id ?>">Apagar</a></td>
	</tr>
	<?php } ?>



</table>