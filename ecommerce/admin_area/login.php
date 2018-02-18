
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<link rel="stylesheet" href="styles/login_style.css" media="all" />
</head>
<body>
	<div class="login">
	<h2 style="color:white; text-align:center;"><?php echo @$_GET['not_admin']; ?></h2>

	<h2 style="color:white; text-align:center;"><?php echo @$_GET['logged_out']; ?></h2>
	
	<h1>Administrador Login</h1>
    <form method="post">
    	<input type="text" name="email" placeholder="Email" required="required" />
        <input type="password" name="password" placeholder="Senha" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large" name="login">Login</button>
    </form>
</div>
	
</body>
</html>
<?php

include("includes/db.php");

	if(isset($_POST['login'])){

		$email=mysqli_real_escape_string($con, $_POST['email']);
		$pass=mysqli_real_escape_string($con, $_POST['password']);

		$sel_user = "SELECT * FROM admins WHERE admin_email ='$email' AND admin_pass='$pass'";
		$run_user = mysqli_query($con, $sel_user);

		$check_user = mysqli_num_rows($run_user);

		if($check_user > 0){

			$_SESSION['admin_email']=$email;

			echo "<script>window.open('index.php?logged_in=Você foi logado com sucesso!','_self')</script>";


		}else{

		
			echo "<script>alert('Senha ou Email errado, tente novamente!)</script>";

		}

	}

?>




