<!DOCTYPE html>
<?php

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

				<div id="carrinho_compra">

					<span style= "line-height:40px; font-size:18px; padding:5px; float:right;">

					Bem vindo convidado! <b style="color:yellow">Carrinho de Compra -</b> Total Itens - Total Preco:
					<a href="carrinho.php" style="color:yellow">Ir para o cesto</a>
						

					</span>
					
				</div>
				
					<div id="produtos_box">
		<?php
		$get_pro = "SELECT * FROM produtos";

		$run_pro = mysqli_query($con, $get_pro);


		while($row_pro=mysqli_fetch_array($run_pro)){

			$pro_id = $row_pro['produto_id'];
			$pro_cat = $row_pro['produto_cat'];
			$pro_marca = $row_pro['produto_marca'];
			$pro_nome = $row_pro['produto_nome'];
			$pro_preco = $row_pro['produto_preco'];
			$pro_image = $row_pro['produto_image'];

			echo "
				<div id='single_produto'>

					<h3>$pro_nome</h3>

					<img src='admin_area/produto_image/$pro_image' width='180' height='180' />
					
					<p><b> R$: $pro_preco </b></p>

					<a href='detalhes.php?pro_id=$pro_id' style='float:left;'>Detalhes</a>

					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add Carrinho</button></a>

				</div>

			";

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