<!--
<pre>
-->
<?php
	session_start();
//	print_r($_SESSION['carrinho']);
	$soma = 0;
?>
<!-- 
</pre>
-->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-homepage.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<li class="nav-item active">
              <a class="nav-link" href="carrinho.php">Carrinho</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
	
	
		<div class="container" style="margin-top: 50px">
			<div class="row">
				<div class="col-md-9">
					<div class="box">
					
					<?php if(!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0){?>							
						<div>
							<h2>Não há nada no seu carrinho</h2>
						</div>		
					<?php }else{ ?>
						
						<!-- /.box-header -->
						<div class="box-header">
						  <h3 class="box-title">Meu Carrinho</h3>
						</div>
					
					<div class="box-body no-padding" id="tabela-de-compras">
					  <table class="table table-condensed">
						<tbody><tr>
						  <th style="width: 10px">Produto</th>
						  <th></th>
						  <th>Qtd.</th>
						  <th style="width: 40px">Preço</th>
						</tr>
					 
					<?php	
						foreach($_SESSION['carrinho'] as $key => $value){
					?>	
						<tr>
						  <td>
							<img src="<?php echo $_SESSION['carrinho'][$key]['img_link'] ?>" height="60" width="60">
						  </td>
						  <td><?php echo $_SESSION['carrinho'][$key]['nome'] ?>
							<div id="car_prod_<?php echo $key ?>">
								<a href="#" class="btn btn-danger" onclick= "remove_item($(this).parent().attr('id'))" style="font-size: 12px;">Remover</a>
							</div>	
						  </td>
						  <td>
							<select id="qtd_<?php echo $key ?>"  onchange="getval(this,<?php echo $key?>)" >
								<?php for($i=1;$i<=6;$i++){ 
									 if($i == $_SESSION['carrinho'][$key]['c_qtd']){
								?>		<option value="<?php echo $i ?>" selected> <?php echo $i ?></option>
									 <?php }else{	?>
										 <option value="<?php echo $i?>"><?php echo $i ?></option>
									 <?php } 	
									}
								?> 
							</select>
						  </td>
						  <td><span class="badge bg-red"><?php echo $_SESSION['carrinho'][$key]['preco']  ?></span></td>
						</tr>
					<?php	
						$soma += $_SESSION['carrinho'][$key]['preco']*$_SESSION['carrinho'][$key]['c_qtd'];
						}
					?>	
					  </tbody></table>
					</div>
					<!-- /.box-body -->
					<?php } ?>
				  </div>
				</div>
				<div class="col-md-3">
					  <div class="card h-100">
						<div class="card-body">
						<h4>Resumo do pedido</h4>
						<hr />
						 
							<div style="display: flex;justify-content: space-between;">
								<span>Total</span>
								<span id="preco_total"><?php echo $soma ?></span>
							</div>
							
						</div>
						<div class="card-footer">
							<a href="#" class="btn btn-success" style="width: 100%" onclick="finaliza_compra()">Comprar</a>
						</div>
					  </div>
				</div>
			</div>
		</div>
	    <!-- Footer -->
		<footer class="py-5 bg-dark">
		  <div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
		  </div>
		  <!-- /.container -->
		</footer>
		
		<script>
		

			function remove_item(id){
				var aux = id.split('_')[2];
				$.post("remove_item.php",{car_prod_id: aux});
				location.reload();
			}
			
			function getval(sel, id)
			{
				console.log(sel.value);
				console.log(id);
				$.post("muda_op.php",{qtd_op : sel.value, val_op: id});
				location.reload();
			}
			function finaliza_compra(){
					var aux = document.getElementById('tabela-de-compras').innerHTML;
					$.post("finaliza_compra.php", {compras : aux});
					window.location.href="finaliza_compra.php";
			}


		</script>
	
</body>
</html>