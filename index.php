<?php
	session_start();
	$con = mysqli_connect("localhost","root","","db");
	
	$sql = "SELECT * FROM produtos"; 
	$result = mysqli_query($con, $sql) or die(mysqli_error());
	$linhas = mysqli_num_rows($result);
	$linha = mysqli_fetch_assoc($result);
	$total = mysqli_num_rows($result);
	
	
	$sql_cat = "SELECT * FROM categoria";
	$result_cat = mysqli_query($con, $sql_cat) or die(mysqli_error());
	$linhas_cat = mysqli_num_rows($result_cat);
	$linha_cat = mysqli_fetch_assoc($result_cat);

	if(!isset($_SESSION['cat_id'])){
		$_SESSION['cat_id'] = 1;
		$current_cat = 1;
	}else{
		$current_cat = $_SESSION['cat_id'];
	}

?>

<!DOCTYPE html>
<html lang="en">

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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contato.php">Contato</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
			<li class="nav-item">
              <a class="nav-link" href="carrinho.php">Carrinho</a>
            </li>
			
			<form role="search" method="post" action="busca.php">
			<div class="search-control">
				<input type="search" id="site-search" name="busca_text"
					   placeholder="Search the site..."
					   aria-label="Search through site content">
				<button type="submit">Search</button>
			</div>
			</form>	
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <div class="col-lg-3">

          <h1 class="my-4">Shop Name</h1>
          <div class="list-group">
		  
			<?php
				do{ 
			?>
				<div id="cat_<?php echo $linha_cat['cat_id'] ?>">
				<?php if($linha_cat['cat_id'] == $current_cat){?>
					<a href="#" class="list-group-item active" onclick="change_view($(this).parent().attr('id'))"><?php echo $linha_cat['nome'] ?></a>
				<?php }else{ ?>
					<a href="#" class="list-group-item" onclick="change_view($(this).parent().attr('id'))"><?php echo $linha_cat['nome'] ?></a>
				<?php } ?>	
				</div>
			<?php 
				}while($linha_cat = mysqli_fetch_assoc($result_cat));	
			?>
          </div>

        </div>
        <!-- /.col-lg-3 -->

        <div class="col-lg-9">

          <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
              
			  <div class="carousel-item active">
				<a href="produto.php" onclick="nome_src(33)">
					<img class="d-block img-fluid" src="https://images-submarino.b2w.io/spacey/2018/06/13/SUB-CAT-Destaque-DESK-1264x315-intel.png" alt="First slide">
				</a>
			  </div>
              
			  <div class="carousel-item">
				<a href="produto.php" onclick="nome_src(32)">
					<img class="d-block img-fluid" src="https://images-submarino.b2w.io/spacey/2018/06/13/Modern-Devices-XPS-13-sub-cat-dest-desk-1264x315.png" alt="Second slide">
				</a>
              </div>
			  
				  <div class="carousel-item">
					<a href="produto.php" onclick="nome_src(31)">
						<img class="d-block img-fluid" src="https://images-submarino.b2w.io/spacey/2018/06/08/INTEL-INSIDE-ODYSSEY-sub-home-dest-desk-1264x315.png" alt="Third slide">
					</a>
				  </div>
			  
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>

			<div class="row">
				<?php
					if(isset($_SESSION['busca']) && $_SESSION['busca'] == 'true'){
						if($_SESSION['busca_count'] > 0){
							//echo count($_SESSION['produtos_busca']);
							foreach($_SESSION['produtos_busca'] as $key => $values){
				?>
								<div class="col-lg-4 col-md-6 mb-4">
								  <div class="card h-100">
									<a href="#"><img class="card-img-top" src="<?php echo $_SESSION['produtos_busca'][$key]['img_link']?>" alt=""></a>
									<div class="card-body">
									  <h4 style="-webkit-box-orient: vertical;-webkit-line-clamp: 2;display: -webkit-box;overflow: hidden;font-size: 14px;">
										<div id="<?php echo $_SESSION['produtos_busca'][$key]['id'] ?>">
											<a href = "produto.php" onclick = "nome_src($(this).parent().attr('id'))"><?php echo $_SESSION['produtos_busca'][$key]['nome']?></a>
										</div>
									  </h4>
									  <h5><?php echo 'R$ ' . number_format($_SESSION['produtos_busca'][$key]['preco'], 2, ',', '.');?></h5>
									</div>
									<div class="card-footer">

									</div>
								  </div>
								</div>
				<?php		
							}				
						}else{
							?> <div class="card-body">

									  <h2>Não foi encontrado nenhum resultado para sua busca</h1>
								</div> <?php
						}
					}else{
							do{
								if($linha['cat_id'] == $current_cat){				
						?>
										<div class="col-lg-4 col-md-6 mb-4">
										  <div class="card h-100">
											<a href="#"><img class="card-img-top" src="<?php echo $linha['img_link']?>" alt=""></a>
											<div class="card-body">
											  <h4 style="-webkit-box-orient: vertical;-webkit-line-clamp: 2;display: -webkit-box;overflow: hidden;font-size: 14px;">
												<div id="<?php echo $linha['id'] ?>">
													<a href = "produto.php" onclick = "nome_src($(this).parent().attr('id'))"><?php echo $linha['nome']?></a>
												</div>
											  </h4>
											  <h5><?php echo 'R$ ' . number_format($linha['preco'], 2, ',', '.'); ?></h5>
											</div>
											<div class="card-footer">

											</div>
										  </div>
										</div>
						<?php			
									}
							}while($linha = mysqli_fetch_assoc($result) );	
					}	
				?>
			<!-- Aqui termina a busca -->

			</div>
			
          <!-- /.row -->

        </div>
        <!-- /.col-lg-9 -->

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark footer-bottom">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script>			
			function nome_src(id){
				var aux = id;
					$.post( "gerencia_home.php", { prod_id: aux , flag_nome: 'true'});
				};

			function change_view(id){
				var aux = id.split('_')[1];
				console.log(aux);
					$.post("gerencia_home.php",{cat_id : aux, flag_view: 'true'});
				location.reload();
			}	
	</script>

  </body>

</html>
