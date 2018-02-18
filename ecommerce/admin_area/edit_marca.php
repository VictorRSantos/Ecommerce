<?php

include("includes/db.php");

if(isset($_GET['edit_marca'])){

	$marca_id = $_GET['edit_marca'];

	$get_marca = "SELECT * FROM marcas WHERE marca_id='$marca_id'";

	$run_marca = mysqli_query($con, $get_marca);
	
	$row_marca = mysqli_fetch_array($run_marca);

	$marca_id = $row_marca['marca_id'];
	$marca_nome = $row_marca['marca_nome'];

}

?>



<form action="" method="post" style="padding:80px;">
	
<b>Atualizar Marca:</b>
<input type="text" name="nova_marca" value="<?php echo $marca_nome; ?>"/>
<input type="submit" name="update_marca" value="Atualizar Marca" />




</form>

<?php


	if(isset($_POST['update_marca'])){

	$update_id = $marca_id;	

	$nova_marca = $_POST['nova_marca'];

	$update_marca = "UPDATE marcas SET marca_nome='$nova_marca' WHERE marca_id='$update_id'";

	$run_update = mysqli_query($con, $update_marca);

	if($run_update){

		echo "<script>alert('Marca foi atualizada!')</script>";
		echo "<script>window.open('index.php?view_marcas','_self')</script>";
	}
	}


?>