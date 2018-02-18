<?php

$con = mysqli_connect("localhost","root","abc123**","ecommerce");

if (mysqli_connect_errno())
{
	echo "Falha na conexão Mysql: ".mysqli_connect_errno();
}


//Pegar o Ip do usuario

function getIp() {

    $ip = $_SERVER['REMOTE_ADDR'];
 
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
 
    return $ip;

}


//Carrinho de compra
function cart(){

	if(isset($_GET['add_carrinho'])){

		global $con;

		$ip = getIp();

		$pro_id = $_GET['add_carrinho'];

		$check_pro = "SELECT ip_add,p_id FROM cart WHERE (ip_add='$ip' AND p_id='$pro_id')";

		$run_check = mysqli_query($con, $check_pro);

		if(mysqli_num_rows($run_check)>0){

		echo"";

		}
		else {

			$insert_pro ="INSERT INTO cart (p_id,ip_add) VALUES ('$pro_id','$ip')";

			$run_pro = mysqli_query($con, $insert_pro);

			echo "<script>window.open('index.php','_self')</script>";

		}


	}

}

//Total de itens
function total_items(){

	if(isset($_GET['add_carrinho'])){

		global $con;

		$ip = getIp();

		$get_items = "SELECT * FROM cart WHERE ip_add='$ip'";

		$run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);

		}else{

		global $con;	

		$ip = getIp();

		$get_items = "SELECT * FROM cart WHERE ip_add='$ip'";

		$run_items = mysqli_query($con, $get_items);

		$count_items = mysqli_num_rows($run_items);

		}

		echo " " .$count_items;

	}



//Pegar o total preco dos items do carrinho
function total_preco(){

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

			$values = array_sum($produto_preco);

			$total +=$values;

		}


	}

	echo "R$ " . $total;

}



//Pegar informação do banco - categoria

function getCats(){

	global $con;

	$get_cats = " select * from  categorias";

	$run_cats = mysqli_query($con, $get_cats);

	while ($row_cats=mysqli_fetch_array($run_cats)){

		$cat_id = $row_cats['cat_id'];
		$cat_nome = $row_cats['cat_nome'];


		echo "<li><a href='index.php?cat=$cat_id'>$cat_nome</a></li>";

	}

}


//Pegar informação do banco - Marcas
function getMarcas(){

	global $con;

	$get_marcas = " select * from  marcas";

	$run_marcas = mysqli_query($con, $get_marcas);

	while ($row_marcas=mysqli_fetch_array($run_marcas)){

		$marca_id = $row_marcas['marca_id'];
		$marca_nome = $row_marcas['marca_nome'];


		echo "<li><a href='index.php?marca=$marca_id'>$marca_nome</a></li>";


	}

}


function getPro(){

	if(!isset($_GET['cat'])){
		if(!isset($_GET['marca'])){
	
		global $con;

		$get_pro = "SELECT * FROM produtos ORDER BY RAND() LIMIT 0,6";

		$run_pro = mysqli_query($con, $get_pro);


			while($row_pro=mysqli_fetch_array($run_pro)){

			$pro_id = $row_pro['produto_id'];
			$pro_cat = $row_pro['produto_cat'];
			$pro_marca = $row_pro['produto_marca'];
			$pro_nome = $row_pro['produto_nome'];
			$pro_preco = $row_pro['produto_preco'];
			$pro_image = $row_pro['produto_image'];

			echo "
				<div id='single_produto'>

					<h3>$pro_nome</h3>

					<img src='admin_area/produto_image/$pro_image' width='180' height='180' />
					
					<p><b> Preço R$: $pro_preco</b></p>

					<a href='detalhes.php?pro_id=$pro_id' style='float:left;'>Detalhes</a>

					<a href='index.php?add_carrinho=$pro_id'><button style='float:right'>Add Carrinho</button></a>

				</div>

			";

	}		
	}

}	

}






function getCatPro(){

	if(isset($_GET['cat'])){
		
		$cat_id = $_GET['cat'];

		global $con;

		$get_cat_pro = "SELECT * FROM produtos WHERE produto_cat='$cat_id'";

		$run_cat_pro = mysqli_query($con, $get_cat_pro);

		$count_cats = mysqli_num_rows($run_cat_pro);

			if($count_cats == 0){

				echo "<h2 style='padding:20px;'>Não há nenhum produto nesta categoria!</h2>";
			}

			while($row_cat_pro=mysqli_fetch_array($run_cat_pro)){

			$pro_id = $row_cat_pro['produto_id'];
			$pro_cat = $row_cat_pro['produto_cat'];
			$pro_marca = $row_cat_pro['produto_marca'];
			$pro_nome = $row_cat_pro['produto_nome'];
			$pro_preco = $row_cat_pro['produto_preco'];
			$pro_image = $row_cat_pro['produto_image'];


			echo "
				<div id='single_produto'>

					<h3>$pro_nome</h3>

					<img src='admin_area/produto_image/$pro_image' width='180' height='180' />
					
					<p><b> R$: $pro_preco </b></p>

					<a href='detalhes.php?pro_id=$pro_id' style='float:left;'>Detalhes</a>

					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add Carrinho</button></a>

				</div>

			";
		}


		

	}

}


function getMarcaPro(){

	if(isset($_GET['marca'])){
		
		$marca_id = $_GET['marca'];

		global $con;

		$get_marca_pro = "SELECT * FROM produtos WHERE produto_marca='$marca_id'";

		$run_marca_pro = mysqli_query($con, $get_marca_pro);

		$count_marcas = mysqli_num_rows($run_marca_pro);

		if($count_marcas==0){

		echo"<h2 style='padding:20px;'>Não há nenhum produto associado a marca!</h2>";

		}

			while($row_marca_pro=mysqli_fetch_array($run_marca_pro)){

			$pro_id = $row_marca_pro['produto_id'];
			$pro_cat = $row_marca_pro['produto_cat'];
			$pro_marca = $row_marca_pro['produto_marca'];
			$pro_nome = $row_marca_pro['produto_nome'];
			$pro_preco = $row_marca_pro['produto_preco'];
			$pro_image = $row_marca_pro['produto_image'];
			
			echo "
				<div id='single_produto'>

					<h3>$pro_nome</h3>

					<img src='admin_area/produto_image/$pro_image' width='180' height='180' />
					
					<p><b> R$: $pro_preco </b></p>

					<a href='detalhes.php?pro_id=$pro_id' style='float:left;'>Detalhes</a>

					<a href='index.php?pro_id=$pro_id'><button style='float:right'>Add Carrinho</button></a>

				</div>

			";
		}
	}
}