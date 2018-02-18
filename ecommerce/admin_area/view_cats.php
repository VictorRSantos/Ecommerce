<table width="795" align="center" bgcolor="#708090">
	<tr align="center">			
		<td colspan="6"><h2>Visualizar Todas Categoria aqui!</h2></td>
	</tr>

	<tr align="center" bgcolor="white">
		<th>ID Categoria</th>
		<th>Nome Categoria</th>
		<th>Editar</th>
		<th>Apagar</th>
	</tr>

	<?php
	include("includes/db.php");

	$get_cat ="SELECT * FROM categorias ORDER BY cat_nome";

	$run_cat = mysqli_query($con,$get_cat);

	$i = 0;

	while ($row_cat=mysqli_fetch_array($run_cat)){

		$cat_id = $row_cat['cat_id'];	
		$cat_nome = $row_cat['cat_nome'];		
		$i++;		

		?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $cat_nome;?></td>		
		<td><a href="index.php?edit_cat=<?php echo $cat_id; ?>">Editar</a></td>
		<td><a href="delete_cat.php?delete_cat=<?php echo $cat_id ?>">Apagar</a></td>
	</tr>
	<?php } ?>



</table>