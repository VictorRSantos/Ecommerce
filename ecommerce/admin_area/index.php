<?php
session_start();

if(isset($_SESSION['admin_email'])){


	echo "<script>window.open('login.php?not_admin=Você não é administrador!','_self')</script>";


}else{




?>




<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Area Administrador</title>
	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>

	<div class="menu_principal">
		
		<div id="header"></div>
		
		<div id="right">
			<h2 style="text-align:center;">Gerenciar</h2>

			<a href="index.php?insert_product">Inserir novo Produto</a>
			<a href="index.php?view_produtos">Visualizar Todos Produto</a>
			<a href="index.php?insert_cats">Inserir nova Categoria</a>
			<a href="index.php?view_cats">Visualizar Todas Categorias</a>
			<a href="index.php?insert_marca">Inserir nova Marca</a>
			<a href="index.php?view_marcas">Visualizar Todas Marcas</a>
			<a href="index.php?view_usuarios">Visualizar Usuarios</a>
			<a href="index.php?view_compras">Visualizar Compras</a>
			<a href="index.php?view_pagamento">Visualizar Pagamentos</a>
			<a href="logout.php">Sair Admin</a>



		</div>	

		<div id="left">
			
			<h2 style="color:red; text-align:center"><?php echo @$_GET['logged_in']; ?></h2>
			<?php
			if(isset($_GET['insert_product'])){
			include("insert_product.php");
			}
			if(isset($_GET['view_produtos'])){

			include("view_produtos.php");
			}

			if(isset($_GET['edit_pro'])){

			include("edit_pro.php");

			}

			if(isset($_GET['insert_cats'])){

			include("insert_cat.php");

			}

			if(isset($_GET['view_cats'])){

			include("view_cats.php");

			}
			if(isset($_GET['edit_cat'])){

			include("edit_cat.php");

			}
			if(isset($_GET['insert_marca'])){

			include("insert_marca.php");

			}
			if(isset($_GET['view_marcas'])){

			include("view_marcas.php");

			}
			if(isset($_GET['edit_marca'])){

			include("edit_marca.php");

			}
			if(isset($_GET['view_usuarios'])){

			include("view_usuarios.php");

			}



			?>	
		


		</div>



	</div>


</body>
</html>
<?php } ?>
