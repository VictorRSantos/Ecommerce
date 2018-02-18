<?php

include("includes/db.php");

if(isset($_GET['edit_cat'])){

	$cat_id = $_GET['edit_cat'];

	$get_cat = "SELECT * FROM categorias WHERE cat_id='$cat_id'";

	$run_cat = mysqli_query($con, $get_cat);
	
	$row_cat = mysqli_fetch_array($run_cat);

	$cat_id = $row_cat['cat_id'];
	$cat_nome = $row_cat['cat_nome'];

}

?>


<form action="" method="post" style="padding:80px;">
	
<b>Atualizar Categoria:</b>
<input type="text" name="nova_cat" value="<?php echo $cat_nome; ?>"/>
<input type="submit" name="update_cat" value="Atualizar Categoria" />




</form>

<?php
include("includes/db.php");

	if(isset($_POST['update_cat'])){

	$update_id = $cat_id;	

	$nova_cat = $_POST['nova_cat'];

	$update_cat = "UPDATE categorias SET cat_nome='$nova_cat' WHERE cat_id='$update_id'";

	$run_cat = mysqli_query($con, $update_cat);

	if($run_cat){

		echo "<script>alert('Categoria foi atualizada!')</script>";
		echo "<script>window.open('index.php?view_cats','_self')</script>";
	}
	}


?>