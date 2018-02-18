<!DOCTYPE html>
<?php
include("includes/db.php");

if(isset($_GET['edit_pro'])){

	$get_id = $_GET['edit_pro'];

	$get_pro ="SELECT * FROM produtos WHERE produto_id='$get_id'";

	$run_pro = mysqli_query($con,$get_pro);

	$i = 0;

	$row_pro=mysqli_fetch_array($run_pro);

		$pro_id = $row_pro['produto_id'];	
		$pro_nome = $row_pro['produto_nome'];
		$pro_image = $row_pro['produto_image'];
		$pro_preco = $row_pro['produto_preco'];
		$pro_desc = $row_pro['produto_desc'];
		$produto_keywords = $row_pro['produto_keywords'];
		$pro_cat = $row_pro['produto_cat'];
		$pro_marca = $row_pro['produto_marca'];

		$get_cat ="SELECT * FROM categorias WHERE cat_id='$pro_cat'";

		$run_cat=mysqli_query($con, $get_cat);

		$row_cat=mysqli_fetch_array($run_cat);

		$categorias_nome = $row_cat['cat_nome'];


		$get_marca ="SELECT * FROM marcas WHERE marca_id='$pro_marca'";

		$run_marca=mysqli_query($con, $get_marca);

		$row_marca=mysqli_fetch_array($run_marca);

		$marca_nome = $row_marca['marca_nome'];

		
}
?>

<html lang="pt=Br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Atualizar Produto</title>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
	
</head>

<body bgcolor="skyblue">
	

	<form action="" method="post" enctype="multipart/form-data">
		

		<table align="center" width="795" border="2" bgcolor="#A8A8B7">

			<tr align="center">
				<td colspan="7"><h2>Atualizar e Editar - Produto</h2></td>							
			</tr>

			
			<tr>
				<td align="right"><b>Nome do Produto:</b></td>
				<td><input type="text" name="produto_nome" size="60" value="<?php echo $pro_nome ?>"/></td>				
			</tr>

			
			<tr>
				<td align="right"><b>Categoria Produto</b></td>
				<td>
				<select name="produto_cat">
					<option><?php echo $categorias_nome ?></option>
					<?php
			$get_cats = "SELECT * FROM categorias";
			
			$run_cats = mysqli_query($con, $get_cats);

			while ($row_cats=mysqli_fetch_array($run_cats)){

			$cat_id = $row_cats['cat_id'];
			$cat_nome = $row_cats['cat_nome'];


			echo "<option value='$cat_id'>$cat_nome</option>";

			}

					?>
				</select>
				</td>				
			</tr>





			<tr>
				<td align="right"><b>Marca Produto:</b></td>
				<td>
				<select name="produto_marca">
					<option><?php echo $marca_nome ?></option>
					<?php

			$get_marcas = "SELECT * FROM marcas";

			$run_marcas = mysqli_query($con, $get_marcas);

			while ($row_marcas=mysqli_fetch_array($run_marcas)){

			$marca_id = $row_marcas['marca_id'];
			$marca_nome = $row_marcas['marca_nome'];


			echo "<option value='$marca_id'>$marca_nome</option>";

			}

					?>
				</select>				

				</td>	

			</tr>



			<tr>
				<td align="right"><b>Imagem Produto:</b></td>
				<td><input type="file" name="produto_image" /><img src="produto_image/<?php echo $pro_image ?>" width="60" height="60" /></td>				
			</tr>
			<tr>
				<td align="right"><b>Preço Produto:</b></td>
				<td><input type="text" name="produto_preco" value="<?php echo $pro_preco ?>"/></td>				
			</tr>

			<tr>
				<td align="right"><b>Descrição Produto:</b></td>
				<td><textarea name="produto_desc" cols="50" rows="19" ><?php echo $pro_desc ?></textarea></td>				
			</tr>

			<tr>
				<td align="right"><b>Palavra-Chave:</b></td>
				<td><input type="text" name="produto_keywords" size="50" value="<?php echo $produto_keywords ?>"/></td>				
			</tr>


			<tr align="center">		
				<td colspan="7"><input type="submit" name="update_produto" value="Atualizar Produto" /></td>				
			</tr>


		</table>
	</form>


</body>
</html>
<?php

	if(isset($_POST['update_produto'])){

		//Recebendo os dados de texto a partir dos campos
		
		$update_id = $pro_id;
		$produto_nome = $_POST['produto_nome'];
		$produto_cat = $_POST['produto_cat'];
		$produto_marca = $_POST['produto_marca'];
		$produto_preco = $_POST['produto_preco'];
		$produto_desc = $_POST['produto_desc'];
		$produto_keywords = $_POST['produto_keywords'];

		//Recebendo os dados de imagem dos campos
		$produto_image = $_FILES['produto_image']['name'];
		$produto_image_tmp = $_FILES['produto_image']['tmp_name'];


		move_uploaded_file($produto_image_tmp,"produto_image/$produto_image");
		
	    $update_produto = "UPDATE produtos SET produto_cat='$produto_cat',produto_marca='$produto_marca',produto_nome='$produto_nome',produto_preco='$produto_preco',produto_desc='$produto_desc',produto_image='$produto_image',produto_keywords='$produto_keywords'
	    WHERE produto_id='$update_id'";
	
	
		$run_produto = mysqli_query($con, $update_produto);

		if($run_produto){

			echo "<script>alert('Produto foi atualizado!')</script>";
			echo "<script>window.open('index.php?view_produtos','_self')</script>";
		}


		



		}

?>