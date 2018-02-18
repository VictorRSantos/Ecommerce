<br><br>

<h2 style="text-align:center; color:red">Você realmente quer APAGAR sua conta?</h2>
<form action="" method="post">

<br><br>
<input type="submit" name="sim" value="Sim quero apagar" />
<input type="submit" name="nao" value="Não quero apagar" />

</form>

<?php
include("includes/db.php");

	$user = $_SESSION['user_email'];

	if(isset($_POST['sim'])){

		$apagar_user = "DELETE FROM usuarios WHERE user_email='$user'";

		$run_user = mysqli_query($con, $apagar_user);

		echo "<script>alert('Estamos triste, a sua conta foi apagado!')</script>";
		echo "<script>window.open('../index.php','_self')</script>";

	}
	if(isset($_POST['nao'])){


		echo "<script>alert('Oh! não brinque novamente!')</script>";
		echo "<script>window.open('minha_conta.php','_self')</script>";

	}



?>