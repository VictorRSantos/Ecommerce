<?php

	include("includes/db.php");

	if(isset($_GET['delete_marca'])){

	$delete_id = $_GET['delete_marca'];

	$delete_marca = "DELETE FROM marcas WHERE marca_id='$delete_id'";

	$run_delete = mysqli_query($con, $delete_marca);

	if($run_delete){

		echo "<script>alert('Marca sera apagada!')</script>";
		echo "<script>window.open('index.php?view_marcas','_self')</script>";
	}



	}


?>