<?php
include("includes/db.php");
?>





<div align="center">
	<form method="post">

		<table width="500" align="center" bgcolor="skyblue">

			<tr align="center">
				<td colspan="3"><h2>Login ou faça o Cadastro para compra!</h2></td>
			</tr>

			<tr>
				<td align="right" ><b>Email:</b></td>
				<td><input type="text" name="email" placeholder="entre com email" required/></td>
			</tr>

			<tr>
				<td align="right"><b>Senha:</b></td>
				<td><input type="password" name="pass" placeholder="entre com a senha" required/></td>
				
			
			</tr>

			<tr align="right">
				<td><a href="checkout.php?forgot_pass">Esqueceu a senha?</a></td>
			</tr>

			<tr align="right">				
				<td><input type="submit" name="login" placeholder="Login"/></td>
			</tr>



		</table>

			<h2 style="float:left; padding:5px;"><a href="user_registro.php" style="text-decoration:none;">Novo? Faça seu registro aqui</a></h2>		
	</form>

	<?php

	if(isset($_POST['login'])){

		$c_email = $_POST['email'];
		$c_pass = $_POST['pass'];

		$sel_c = "SELECT * FROM usuarios WHERE user_pass='$c_pass' AND user_email='$c_email'";

		$run_c = mysqli_query($con, $sel_c);

		$check_usuario = mysqli_num_rows($run_c);

		if($check_usuario==0){

			echo "<script>alert('Senha ou Email incorreto, Tente novamente!')</script>";
			exit();
		}else{
		$ip = getIp();

		$sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);


		if($check_usuario>0 AND $check_cart==0){

		$_SESSION['user_email']=$c_email;

		echo "<script>alert('Você foi logado com sucesso. Obrigado!')</script>";
		echo "<script>window.open('customer/minha_conta.php','_self')</script>";
	
		}else{

			$_SESSION['user_email']=$c_email;

			echo "<script>alert('Você foi logado com sucesso. Obrigado!')</script>";
			echo "<script>window.open('checkout.php','_self')</script>";




		}

	}
}

	?>
</div>