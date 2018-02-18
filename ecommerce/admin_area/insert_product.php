<!DOCTYPE html>

<?php

include("includes/db.php");

?>




<html lang="pt=Br">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>AdminSystem</title>
	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  	<script>tinymce.init({ selector:'textarea' });</script>
	
</head>

<body bgcolor="skyblue">
	

	<form action="insert_product.php" method="post" enctype="multipart/form-data">
		

		<table align="center" width="795" border="2" bgcolor="#A8A8B7">

			<tr align="center">
				<td colspan="7"><h2>Cadastrar produto</h2></td>							
			</tr>

			
			<tr>
				<td align="right"><b>Nome do Produto:</b></td>
				<td><input type="text" name="produto_nome" size="60" /></td>				
			</tr>

			
			<tr>
				<td align="right"><b>Categoria Produto</b></td>
				<td>
				<select name="produto_cat">
					<option>Selecione a Categoria</option>
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
					<option>Selecione Marca</option>
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
				<td><input type="file" name="produto_image"  /></td>				
			</tr>
			<tr>
				<td align="right"><b>Preço Produto:</b></td>
				<td><input type="text" name="produto_preco"/></td>				
			</tr>

			<tr>
				<td align="right"><b>Descrição Produto:</b></td>
				<td><textarea name="produto_desc" cols="50" rows="19" ></textarea></td>				
			</tr>

			<tr>
				<td align="right"><b>Palavra-Chave:</b></td>
				<td><input type="text" name="produto_keywords" size="50" /></td>				
			</tr>


			<tr align="center">		
				<td colspan="7"><input type="submit" name="insert_post" value="Inserir Produto" /></td>				
			</tr>


		</table>
	</form>


</body>
</html>
<?php

	if(isset($_POST['insert_post'])){

		//Recebendo os dados de texto a partir dos campos
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
		
	    $insert_product = "INSERT INTO produtos
		(produto_cat,produto_marca,produto_nome,produto_preco,produto_desc,produto_image,produto_keywords)
		VALUES ('$produto_cat','$produto_marca','$produto_nome','$produto_preco','$produto_desc','$produto_image','$produto_keywords')";
	



		
		$insert_pro = mysqli_query($con, $insert_product);

		if($insert_pro){

			echo "<script>alert('Produto cadastrado com sucesso!.')</script>";
			echo "<script>window.open('index.php?insert_product','_self')</script>";
		}


		



		}

?>


