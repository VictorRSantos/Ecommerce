<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");

?>



<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>SystemForSystem</title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>
	

<!--Estrutura geral começa aqui-->

	<div class="menu_principal">		
		
		<!--Header começa aqui-->
		<div class="header_principal">
				
				<a href="../index.php"><img id="logo" src="imagens/logo.jpg"/></a>
				
		</div>
		<!--Header termina aqui-->

		<!--Menu de navegação começa aqui-->
		<div class="menubar">			

				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="../all_produtos.php">Todos Produtos</a></li>
					<li><a href="customer/minha_conta.php">Minha Conta</a></li>
					<li><a href="checkout.php">Login</a></li>
					<li><a href="carrinho.php">Carrinho</a></li>
					<li><a href="">Contato</a></li>					
				</ul>


				<div id="form">
					<form method="get" action="results.php" enctype="multipart/form-data">
						<input type="text" name="user_query" placeholder="Busca produtos."/>
						<input type="submit" name="search" value="Busca" />
					</form>
				</div>

		</div>
		<!--Menu de navegação termina aqui-->
		
		<!--Content Principal começa aqui-->
		<div class="content_principal">
			

			<div id="sidebar">
				
				<div id="sidebar_title">Minha conta</div>

					<ul id="cats">


						<?php

						$user = $_SESSION['user_email'];

						$get_img = "SELECT * FROM usuarios WHERE user_email='$user'";

						$run_img = mysqli_query($con, $get_img);

						$row_img = mysqli_fetch_array($run_img);						

						//$c_image =  $row_img['user_image'];
						
						$c_nome = $row_img['user_name'];

						echo "<p style='text-align:center;'></p>";

						?>

						<li><a href="minha_conta.php?minha_ordem">Minhas Compras</a></li>
						<li><a href="minha_conta.php?edit_conta">Editar Conta</a></li>
						<li><a href="minha_conta.php?mudar_pass">Alterar Senha</a></li>
						<li><a href="minha_conta.php?apagar_conta">Apagar Conta</a></li>
						<li><a href="logout.php">Sair</a></li>
								
					</ul>
		</div>			

				

			
			<div id="content_area">

				<?php cart(); ?>

				<div id="carrinho_compra">

					<span style= "line-height:40px; font-size:17px; padding:5px; float:right;">
					
					<?php
					if(isset($_SESSION['user_email'])){

					echo "<b>Usuario:</b>" . $_SESSION['user_email'];
					
					}
					?>

					
					<?php
					if(!isset($_SESSION['user_email'])){

						echo "<a href='checkout.php'style='color:orange;'>Entrar</a>";
					}else{

						echo "<a href='logout.php'  style='color:orange;'>Sair</a>";

					}

					?>
						

					</span>
					
				</div>

				
					<div id="produtos_box">
						
						
						<?php

						if(!isset($_GET['minha_ordem'])){
							if(!isset($_GET['edit_conta'])){
								if(!isset($_GET['mudar_pass'])){
									if(!isset($_GET['apagar_conta'])){						


						echo "
						<h2 style='padding:20px;'>Bem Vindo: $c_nome; </h2>
						<b>Você pode ver suas compras, clicando neste <a href='minha_conta.php?minha_ordem'>link</a></b>";
									

									}
								}
							}
						}	
						?>

						<?php

						if(isset($_GET['edit_conta'])){
						include("edit_conta.php");
						}


						if(isset($_GET['mudar_pass'])){
						include("mudar_pass.php");
						}
						if(isset($_GET['apagar_conta'])){
						include("apagar_conta.php");
						}


						?>
						








					</div>

			</div>
		
		</div>
		<!--Content Principal termina aqui-->


		
		<div id="footer">


			<h2 style="text-align:center; padding-top:30px;">&copy; 2016 by System for System</h2>


		</div>






	</div>
	<!--Estrutura geral termina aqui-->

</body>
</html>