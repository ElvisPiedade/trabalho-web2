<?php
	session_start();
	$_SESSION['carrinho'][$_POST['val_op']]['c_qtd'] = $_POST['qtd_op'];
?>
