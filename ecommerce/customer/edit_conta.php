<?php
	
	include("includes/db.php");

	$user = $_SESSION['user_email'];

	$get_usuario = "SELECT * FROM usuarios WHERE user_email='$user'";

	$run_usuario = mysqli_query($con, $get_usuario);

	$row_usuario = mysqli_fetch_array($run_usuario);


	$c_id = $row_usuario['user_id'];
	$nome = $row_usuario['user_name'];
	$email = $row_usuario['user_email'];
	//$pass = $row_usuario['user_pass'];
	$estado = $row_usuario['user_pais'];
	$cidade = $row_usuario['user_cidade'];
	$contato1 = $row_usuario['user_contato'];
	$contato2 = $row_usuario['user_contato2'];
	$cep = $row_usuario['user_cep'];
	$endereco = $row_usuario['user_endereco'];
	$numero = $row_usuario['user_numero'];
	$complemento = $row_usuario['user_complemento'];	

?>




<form action="" method="post" enctype="multipart/form-data">
	<table align="center" width="750">
		<tr>
			<td align="center"><h2>Atualizar sua Conta</h2></td><br>
		</tr>

		<tr>
			<td align="right">Nome</td>
			<td colspan="6"><input type="text" name="c_nome" value="<?php echo $nome;?>"required/ ></td>
		</tr>

		<tr>
			<td align="right">Email</td>
			<td><input type="text" name="c_email" value="<?php echo $email;?>"required /></td>
		</tr>
		<!--
		<tr>
			<td align="right">Senha</td>
			<td><input type="password" name="c_pass" value="<?php echo $pass;?>"/></td>
		</tr>
		-->
		<tr>
			<td align="right">Estado</td>
			<td>
				<select name="c_estado">
					<option><?php echo $estado;?></option>					
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
			<td><input type="text" name="c_cidade" value="<?php echo $cidade;?>" required/></td>
		</tr>

		<tr>
			<td align="right">Contato 1</td>
			<td><input type="text" name="c_contato" value="<?php echo $contato1;?>" required/></td>
		</tr>

		<tr>
			<td align="right">Contato 2</td>
			<td><input type="text" name="c_contato2" value="<?php echo $contato2;?>" /></td>
		</tr>

		<tr>
			<td align="right">Cep</td>
			<td><input type="text" name="c_cep" value="<?php echo $cep;?>" required></td>							
		</tr>

		<tr>
			<td align="right">Endereço</td>
			<td><input type="text" name="c_endereco" value="<?php echo $endereco;?>" required></td>							
		</tr>

		<tr>
			<td align="right">Numero</td>
			<td><input type="text" name="c_numero" value="<?php echo $numero;?>" required></td>							
		</tr>

		<tr>
			<td align="right">Complemento</td>
			<td><input type="text" name="c_complemento" value="<?php echo $complemento;?>" required></td>							
		</tr>

		<tr align="center">
			<td colspan="4"><input type="submit" name="update" value="Atualizar" /></td>
		</tr>

	</table>

</form>
	
	
<?php
	if(isset($_POST['update'])){

		$ip =getIp();


		$user_id = $c_id;


		$c_nome = $_POST['c_nome'];
		$c_email = $_POST['c_email'];
		//$c_pass = $_POST['c_pass'];		
		$c_estado = $_POST['c_estado'];
		$c_cidade = $_POST['c_cidade'];
		$c_contato = $_POST['c_contato'];
		$c_contato2 = $_POST['c_contato2'];
		$c_cep = $_POST['c_cep'];
		$c_endereco = $_POST['c_endereco'];
		$c_numero = $_POST['c_numero'];
		$c_complemento = $_POST['c_complemento'];



		

		$update_c ="UPDATE usuarios SET user_name='$c_nome',user_email='$c_email',user_pais='$c_estado',
		user_cidade='$c_cidade',user_contato='$c_contato',user_complemento='$c_complemento',user_numero='$c_numero',
		user_cep='$c_cep',user_contato2='$c_contato2',user_endereco='$c_endereco' WHERE user_id='$user_id'";

		$run_update = mysqli_query($con, $update_c);

		if($run_update){

			echo "<script>alert('Sua conta foi atualizada com sucesso!')</script>";
			echo "<script>window.open('minha_conta.php','_self')</script>";

		}	

		


	}



?>