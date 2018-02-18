<table width="795" align="center" bgcolor="#708090">
	<tr align="center">			
		<td colspan="6"><h2>Visualizar Todos os Produtos Aqui!</h2></td>
	</tr>

	<tr align="center" bgcolor="white">
		<th>ID</th>
		<th>Nome</th>
		<th>Image</th>
		<th>Preço</th>
		<th>Editar</th>
		<th>Apagar</th>
	</tr>

	<?php
	include("includes/db.php");

	$get_pro ="SELECT * FROM produtos ORDER BY produto_nome";

	$run_pro = mysqli_query($con,$get_pro);

	$i = 0;

	while ($row_pro=mysqli_fetch_array($run_pro)){

		$pro_id = $row_pro['produto_id'];	
		$pro_nome = $row_pro['produto_nome'];
		$pro_image = $row_pro['produto_image'];
		$pro_preco = $row_pro['produto_preco'];
		$i++;		

		?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $pro_nome;?></td>
		<td><img src="produto_image/<?php echo $pro_image;?>" width="60" height="60" /></td>
		<td><?php echo $pro_preco;?></td>
		<td><a href="index.php?edit_pro=<?php echo $pro_id; ?>">Editar</a></td>
		<td><a href="delete_pro.php?delete_pro=<?php echo $pro_id ?>">Apagar</a></td>
	</tr>
	<?php } ?>
</table>

