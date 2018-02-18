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
					<li><a href="usuario/minha_conta.php">Minha Conta</a></li>
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

					<span style= "line-height:40px; font-size:16px; padding:5px; float:right;">
					

					<?php
					if(isset($_SESSION['user_email'])){


					echo "<b>Usuario:</b>" . $_SESSION['user_email'] . "<b style='color:yellow;'> Seu </b>";

					}else{

						echo "<b>Bem vindo convidado!</b>";
					}
					?>


					<b style="color:yellow">Carrinho de Compra -</b> Total Itens:<?php total_items();?>
					Total Preco:<?php total_preco(); ?>
					<a href="index.php" style="color:yellow">Voltar para compra</a>

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

						
						<form action="" method="post" enctype="multipart/form-data">
							
						<table align="center" width="700" bgcolor="skyblue">
							

							<tr align="center">
								<th>Remover</th>
								<th>Produto (S)</th>
								<th>Quantidade</th>
								<th>Total Price</th>								
							</tr>

							
	<?php
	$total = 0;

	global $con;

	$ip = getIp();

	$sel_preco = "SELECT * FROM cart WHERE ip_add='$ip'";

	$run_preco = mysqli_query($con, $sel_preco);

	while($p_preco=mysqli_fetch_array($run_preco)){

		$pro_id = $p_preco['p_id'];

		$pro_preco = "SELECT * FROM produtos WHERE produto_id='$pro_id'";

		$run_pro_preco = mysqli_query($con, $pro_preco);

		while($pp_preco = mysqli_fetch_array($run_pro_preco)){

			$produto_preco = array($pp_preco['produto_preco']);

			$produto_nome = $pp_preco['produto_nome'];

			$produto_image = $pp_preco['produto_image'];

			$single_preco = $pp_preco['produto_preco'];

			$values = array_sum($produto_preco);

			$total += $values; 

	

	?>

		<tr align="center">
			<td><input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/></td>
			<td><?php echo $produto_nome; ?></br>
			<img src="admin_area/produto_image/<?php echo $produto_image; ?>" width="60" height="60"/>
			</td>
			<td><input type="text" size="3" name="qtd" value=""/></td>
			<?php
			//VOLTAR AQUI
			if(isset($_POST['update_cart'])){

				$qtd = $_POST['qtd'];

				$update_qtd = "UPDATE cart SET qtd='$qtd'";

				$run_qtd = mysqli_query($con, $update_qtd);

				$_SESSION['qtd']=$qtd;


				$total = $total*$qtd;


			}
			
			?>


			<td><?php echo "R$" . $single_preco; ?></td>			
		</tr>

		<?php } } ?>

		<tr align="right">
			<td colspan="4"><b>Sub Total:</b></td>
			<td><?php echo "R$" .$total; ?></td>
		</tr>	

		<tr align="center">
			<td colspan="2"><input type="submit" name="update_cart" value="Atutalizar Carrinho"></td>
			<td><input type="submit" name="continue" value="Continuar Comprando"></td>
			<td><button><a href="checkout.php" style="text-decoration:none; color: black;">Conferir</a></button></td>			
		</tr>


		</table>
						

		</form>

		<?php
			//VOLTAR AQUI E VERIFICAR O CODIGO
			global $con;
		
			$ip = getIp();

			if(isset($_POST['update_cart'])){
				foreach ($_POST['remove'] as $remove_id) {
					# code...
				$delete_produto = "DELETE FROM cart WHERE p_id='$remove_id' AND ip_add='$ip'";	

				$run_delete = mysqli_query($con, $delete_produto);

				if($run_delete){

					echo "<script>window.open('carrinho.php','_self')</script>";
				}
				


				}
			}

			if(isset($_POST['continue'])){

				echo "<script>window.open('index.php','_self')</script>";

			}

			echo @$up_cart = updatecart();

		
	
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