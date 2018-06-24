<?php
	session_start();
	$teste = $_SESSION['current_prod'];
	$img_prod = $_SESSION['current_img'];
	$preco_prod = $_SESSION['current_preco'];
	$id_prod = $_SESSION['current_id'];
	
	$con = mysqli_connect("localhost","root","","db");
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

    <title>Shop Item - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/shop-item.css" rel="stylesheet">
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
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
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
			<form role="search">
			<div class="search-control">
				<input type="search" id="site-search" name="q"
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

          <div class="card mt-4">
            <img class="card-img-top img-fluid" src="<?php echo $img_prod ?>" alt="">
			<div class="card-body" id="prod_<?php echo $id_prod ?>">
				<h3 class="card-title"><?php echo $teste ?></h3>
				<h4>R$<?php echo $preco_prod ?></h4>
				<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
				<button  id="btn_comprar" class="btn btn-success">Comprar</button>
			</div>
          </div>
          <!-- /.card -->

          <div class="card card-outline-secondary my-4">
            <div class="card-header">
              Product Reviews
            </div>
            <div class="card-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
              <small class="text-muted">Posted by Anonymous on 3/1/17</small>
              <hr>
              <button class="btn btn-success">Comprar</button>
            </div>
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col-lg-9 -->

      </div>

    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script>
		$("#btn_comprar").click(function() {
			var aux =  document.getElementById("btn_comprar").parentElement.id;
			
			aux = aux.split('_')[1];
			console.log(aux);
			$.post("envia_item.php",{add_id : aux});
			window.location.href = 'carrinho.php';
		});
	</script>
  </body>

</html>
