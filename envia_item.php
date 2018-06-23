<?php
	session_start();

	$id = $_POST['add_id'];
	
	$con = mysqli_connect("localhost","root","","db");
	$sql = "SELECT * FROM produtos WHERE id = '$id'"; 

	$result = mysqli_query($con, $sql) or die(mysqli_error());
	$linhas = mysqli_num_rows($result);
	$linha = mysqli_fetch_assoc($result);
	$total = mysqli_num_rows($result);
	
	$_SESSION['carrinho'][$linha['id']] = $linha;
	$_SESSION['carrinho'][$linha['id']]['c_qtd'] = '1';

		
	
?>

