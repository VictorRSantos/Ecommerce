<!DOCTYPE html>
<?php
session_start();
include("functions/functions.php");
include("includes/db.php");

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

					<span style= "line-height:40px; font-size:18px; padding:5px; float:right;">

					Bem vindo convidado! <b style="color:yellow">Carrinho de Compra -</b> Total Itens:<?php total_items();?>
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


				<form action="user_registro.php" method="post" enctype="multipart/form-data">
					
					<table align="center" width="750">
						<tr>
							<td align="center"><h2>Criar conta</h2></td>
						</tr>

						<tr>
							<td align="right">Nome</td>
							<td colspan="6"><input type="text" name="c_nome" required/ ></td>
						</tr>

						<tr>
							<td align="right">Email</td>
							<td><input type="text" name="c_email" required /></td>
						</tr>

						<tr>
							<td align="right">Senha</td>
							<td><input type="password" name="c_pass" required/></td>
						</tr>


						<tr>
							<td align="right">Estado</td>
							<td>
								<select name="c_estado" required>
									<option value="estado">Selecione o Estado</option> 
										<option value="ac">Acre</option> 
										<option value="al">Alagoas</option> 
										<option value="am">Amazonas</option> 
										<option value="ap">Amapá</option> 
										<option value="ba">Bahia</option> 
										<option value="ce">Ceará</option> 
										<option value="df">Distrito Federal</option> 
										<option value="es">Espírito Santo</option> 
										<option value="go">Goiás</option> 
										<option value="ma">Maranhão</option> 
										<option value="mt">Mato Grosso</option> 
										<option value="ms">Mato Grosso do Sul</option> 
										<option value="mg">Minas Gerais</option> 
										<option value="pa">Pará</option> 
										<option value="pb">Paraíba</option> 
										<option value="pr">Paraná</option> 
										<option value="pe">Pernambuco</option> 
										<option value="pi">Piauí</option> 
										<option value="rj">Rio de Janeiro</option> 
										<option value="rn">Rio Grande do Norte</option> 
										<option value="ro">Rondônia</option> 
										<option value="rs">Rio Grande do Sul</option> 
										<option value="rr">Roraima</option> 
										<option value="sc">Santa Catarina</option> 
										<option value="se">Sergipe</option> 
										<option value="sp">São Paulo</option> 
										<option value="to">Tocantins</option> 
								</select>

							</td>
						</tr>


						<tr>
							<td align="right">Cidade</td>
							<td><input type="text" name="c_cidade"  required/></td>
						</tr>

						<tr>
							<td align="right">Contato 1</td>
							<td><input type="text" name="c_contato" required/></td>
						</tr>

						<tr>
							<td align="right">Contato 2</td>
							<td><input type="text" name="c_contato2" /></td>
						</tr>

						<tr>
							<td align="right">Cep</td>
							<td><input type="text" name="c_cep" required></td>							
						</tr>

						<tr>
							<td align="right">Endereço</td>
							<td><input type="text" name="c_endereco" required></td>							
						</tr>

						<tr>
							<td align="right">Numero</td>
							<td><input type="text" name="c_numero" required></td>							
						</tr>

						<tr>
							<td align="right">Complemento</td>
							<td><input type="text" name="c_complemento"></td>							
						</tr>

						<tr align="center">
							<td colspan="4"><input type="submit" name="registro" value="Criar Conta" /></td>
						</tr>



					</table>

				</form>
				

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
<?php
	if(isset($_POST['registro'])){

		$ip =getIp();

		$c_nome = $_POST['c_nome'];
		$c_email = $_POST['c_email'];
		$c_pass = $_POST['c_pass'];		
		$c_estado = $_POST['c_estado'];
		$c_cidade = $_POST['c_cidade'];
		$c_contato = $_POST['c_contato'];
		$c_contato2 = $_POST['c_contato2'];
		$c_cep = $_POST['c_cep'];
		$c_endereco = $_POST['c_endereco'];
		$c_numero = $_POST['c_numero'];
		$c_complemento = $_POST['c_complemento'];



		

		$insert_c ="INSERT INTO usuarios(user_ip,user_name,user_email,user_pass,user_pais,user_cidade,user_contato,user_complemento,user_numero,user_cep,user_contato2,user_endereco)
		VALUES ('$ip','$c_nome','$c_email','$c_pass','$c_estado','$c_cidade','$c_contato','$c_complemento','$c_numero','$c_cep','$c_contato2','$c_endereco')";

		$run_c = mysqli_query($con, $insert_c);

		$sel_cart = "SELECT * FROM cart WHERE ip_add='$ip'";

		$run_cart = mysqli_query($con, $sel_cart);

		$check_cart = mysqli_num_rows($run_cart);


		if($check_cart==0){

			$_SESSION['user_email']=$c_email;

			echo "<script>alert('Conta criada com sucesso. Obrigado!')</script>";
			echo "<script>window.open('customer/minha_conta.php','_self')</script>";

		}else{

			$_SESSION['user_email']=$c_email;

			echo "<script>alert('Sua conta foi criada com sucesso, Obrigado!')</script>";
			
			echo "<script>window.open('checkout.php','_self')</script>";


		}


	}



?>