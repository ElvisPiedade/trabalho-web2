<?php
	session_start();
	$item = $_POST['car_prod_id'];
	unset($_SESSION['carrinho'][$item]);
?>