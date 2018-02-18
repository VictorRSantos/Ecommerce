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
				
				<img id="logo" src="imagens/logo.jpg"/>
				
		</div>
		<!--Header termina aqui-->

		<!--Menu de navegação começa aqui-->
		<div class="menubar">			

				<ul id="menu">
					<li><a href="">Home</a></li>
					<li><a href="">Todos Produtos</a></li>
					<li><a href="">Minha Conta</a></li>
					<li><a href="">Login</a></li>
					<li><a href="">Carrinho</a></li>
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

	if(isset($_GET['pro_id'])){

	$produto_id = $_GET['pro_id'];	

	$get_pro = "SELECT * FROM produtos WHERE produto_id='$produto_id'";
	
	$run_pro = mysqli_query($con, $get_pro);
		
	while($row_pro=mysqli_fetch_array($run_pro)){

		$pro_id = $row_pro['produto_id'];		
		$pro_nome = $row_pro['produto_nome'];
		$pro_preco = $row_pro['produto_preco'];
	    $pro_image = $row_pro['produto_image'];
	    $pro_desc = $row_pro['produto_desc'];

		echo "
			<div id='single_produto'>

				<h3>$pro_nome</h3>

				<img src='admin_area/produto_image/$pro_image' width='400' height='300' />
				
				<p><b> R$: $pro_preco </b></p>

				<p>$pro_desc</p>

				<a href='index.php' style='float:left;'><button>Voltar</button></a>

				<a href='index.php?pro_id=$pro_id'><button style='float: right'>Add Carrinho</a>

			</div>

		";

	}
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