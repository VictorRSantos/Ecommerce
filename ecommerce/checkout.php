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
				
				<a href="index.php"><img id="logo" src="imagens/logo.jpg"/></a>
				
		</div>
		<!--Header termina aqui-->

		<!--Menu de navegação começa aqui-->
		<div class="menubar">			

				<ul id="menu">
					<li><a href="index.php">Home</a></li>
					<li><a href="all_produtos.php">Todos Produtos</a></li>
					<li><a href="customer/minha_conta.php">Minha Conta</a></li>
					<li><a href="">Login</a></li>
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
				
				<div id="sidebar_title">Categoria</div>

					<ul id="cats">

						<?php getCats(); ?>
								
					</ul>

				<div id="sidebar_title">Marcas</div>

					<ul id="cats">
						<?php getMarcas(); ?>

					</ul>

				</div>
			

			
			<div id="content_area">

				<?php cart(); ?>

				<div id="carrinho_compra">

					<span style= "line-height:40px; font-size:17px; padding:5px; float:right;">
					

					<?php
					if(isset($_SESSION['user_email'])){


					echo "<b>Usuario:</b>" . $_SESSION['user_email'] . "<b style='color:yellow;'> Seu </b>";

					}else{

						echo "<b>Bem vindo convidado!</b>";
					}
					?>

					
					<b style="color:yellow">Carrinho de Compra -</b> Total Itens:<?php total_items();?>
					Total Preco:<?php total_preco(); ?>
					<a href="carrinho.php" style="color:yellow">Ir para o cesto</a>
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
							if(!isset($_SESSION['user_email'])){

								include("user_login.php");
							
							}else{

								include("payment.php");
								
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