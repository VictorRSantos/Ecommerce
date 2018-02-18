<h2 style="text-align:center;">Alterar sua Senha</h2>

<form action="" method="post">
	<table align="center" style="margin-left:200px"  height="140px">
		<tr>	
			<td align="right"><b>Entre com a sua senha:</b></td>
			<td><input type="password" name="current_pass" required></td>
		</tr>

		<tr>
			<td align="right"><b>Entre com sua nova senha:</b></td>
			<td><input type="password" name="nova_pass" required></td>
		</tr>

		<tr>
			<td align="right"><b>Confirmar sua nova senha:</b></td>
			<td><input type="password" name="nova_pass_denovo" required></td>
		</tr>
		<br>
		<tr align="center">
		<td colspan="5"><input type="submit" name="mudar_pass" value="Alterar senha"></td>	
		</tr>
	
	</table>
</form>
<?php

include("includes/db.php");

	if(isset($_POST['mudar_pass'])){

		$user = $_SESSION['user_email'];

		$current_pass = $_POST['current_pass'];
		$nova_pass = $_POST['nova_pass'];
		$nova_pass_denovo = $_POST['nova_pass_denovo'];

		$sel_pass = "SELECT * FROM usuarios WHERE user_pass='$current_pass' AND user_email='$user'";

		$run_pass = mysqli_query($con, $sel_pass);

		$check_pass = mysqli_num_rows($run_pass);

		if($check_pass==0){

			echo "<script>alert('Sua senha atual está errada!')</script>";
			exit();

		}

		if($nova_pass!=$nova_pass_denovo){

			echo "<script>alert('Nova senha não correspondem!')</script>";
			exit();

		}else{

			$update_pass = "UPDATE usuarios SET user_pass='$nova_pass' WHERE user_email='$user'";
			
			$run_update = mysqli_query($con, $update_pass);

			echo "<script>alert('Sua senha foi atualizada com sucesso!')</script>";
			echo "<script>window.open('minha_conta.php','_self')</script>";

		}


	}

?>