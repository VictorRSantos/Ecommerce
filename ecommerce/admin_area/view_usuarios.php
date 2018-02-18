<table width="795" align="center" bgcolor="#708090">
	<tr align="center">			
		<td colspan="6"><h2>Visualizar Todos Usuarios Aqui!</h2></td>
	</tr>

	<tr align="center" bgcolor="white">
		<th>ID</th>
		<th>Nome</th>
		<th>Email</th>		
		
	</tr>

	<?php
	include("includes/db.php");

	$get_user ="SELECT * FROM usuarios  ORDER BY user_name";

	$run_user = mysqli_query($con,$get_user);

	$i = 0;

	while ($row_user=mysqli_fetch_array($run_user)){

		$user_id = $row_user['user_id'];	
		$user_nome = $row_user['user_name'];
		$user_email = $row_user['user_email'];				
		$i++;		

		?>
	<tr align="center">
		<td><?php echo $i;?></td>
		<td><?php echo $user_nome;?></td>
		<td><?php echo $user_email;?></td>		
		<td><a href="delete_usuarios.php?delete_user=<?php echo $user_id ?>">Apagar</a></td>
	</tr>
	<?php } ?>



</table>