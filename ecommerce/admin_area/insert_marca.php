<form action="" method="post" style="padding:80px;">
	
<b>Inserir nova Marca:</b>
<input type="text" name="nova_marca" required/>
<input type="submit" name="add_marca" value="Adiconar Marca" />




</form>

<?php
include("includes/db.php");

	if(isset($_POST['add_marca'])){

	$nova_marca = $_POST['nova_marca'];

	$insert_marca = "INSERT INTO marcas (marca_nome) VALUES ('$nova_marca')";

	$run_marca = mysqli_query($con, $insert_marca);

	if($run_marca){

		echo "<script>alert('Foi criado uma nova Marca!')</script>";
		echo "<script>window.open('index.php?view_marcas','_self')</script>";
	}
	}


?>