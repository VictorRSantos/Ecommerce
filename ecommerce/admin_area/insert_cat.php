<form action="" method="post" style="padding:80px;">
	
<b>Inserir nova Categoria:</b>
<input type="text" name="nova_cat" required/>
<input type="submit" name="add_cat" value="Adiconar Categoria" />




</form>

<?php
include("includes/db.php");

	if(isset($_POST['add_cat'])){

	$nova_cat = $_POST['nova_cat'];

	$insert_cat = "INSERT INTO categorias (cat_nome) VALUES ('$nova_cat')";

	$run_cat = mysqli_query($con, $insert_cat);

	if($run_cat){

		echo "<script>alert('Foi criado uma nova Categoria!')</script>";
		echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	}


?>