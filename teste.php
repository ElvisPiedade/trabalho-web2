<?php
	session_start();
	$_SESSION['prod_id'] = $_POST['prod_id'];
	$id = $_SESSION['prod_id'];
	
	$con = mysqli_connect("localhost","root","","db");
	$sql = "SELECT * FROM produtos WHERE id = '$id'"; 

	$result = mysqli_query($con, $sql) or die(mysqli_error());
	$linhas = mysqli_num_rows($result);
	$linha = mysqli_fetch_assoc($result);
	$total = mysqli_num_rows($result);
	
	$_SESSION['current_id'] = $linha['id'];
	$_SESSION['current_prod'] = $linha['nome'];
	$_SESSION['current_img'] = $linha['img_link'];
	$_SESSION['current_preco'] = $linha['preco'];
?>