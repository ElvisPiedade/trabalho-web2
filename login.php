<?php
	session_start();
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
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contato.php">Contato</a>
            </li>
			<li class="nav-item active">
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

    <div class="container" style="margin-top:40px">
		<div class="row">
		<?php if(!isset($_SESSION['loginname'])){?>
			
			<div class="col-sm-6 col-md-6 col-md-offset-4">
				<div class="panel2 panel-default2">
					<div class="panel-heading2">
						<strong>Faça o Login</strong>
					</div>
					<div class="panel-body2">
						<form role="form" method="POST" action="pagina-login.php">
	 						<fieldset>
								<?php
								
									if(isset($_SESSION['logout'])){
										if($_SESSION['logout'] == 'true'){
												?>
													<div class="alert alert-info alert-dismissible">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Sucesso!</strong> Logoff feito com sucesso
													</div>
												<?php												
										}
										unset($_SESSION['logout']);
									}
									
									if(isset($_SESSION['user_status'])){
										$status = $_SESSION['user_status'];
									
										switch ($status) {
											case 'invalido':
												?>
													<div class="alert alert-danger alert-dismissible">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Erro!</strong> Usuário ou Senha inválidos
													</div>
													
												<?php	
												unset($_SESSION['user_status']);
												break;
											case 'cadastrado':
												?>
													<div class="alert alert-success alert-dismissible">
														<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
														<strong>Sucesso!</strong> Cadastro completo
													</div>
												<?php
												unset($_SESSION['user_status']);
												break;
										}
									}
								?>								
								
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Usuário" name="loginname" type="text" required autofocus/>
											</div>	
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Senha" name="senha" type="password" value="" required/>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Login" />
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
                </div>
			</div>
			
			<div class="col-sm-6 col-md-6 col-md-offset-4">
				<div class="panel2 panel-default2">
					<div class="panel-heading2">
						<strong>Cadastro</strong>
					</div>
					<div class="panel-body2">
						<form role="form" method="GET" action="valida-cadastro.php">
							<fieldset>
								<?php
									if(isset($_SESSION['user_status'])){
										$status = $_SESSION['user_status'];
										if($status == 'existente'){
								?>
									<div class="alert alert-danger alert-dismissible">
										<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										<strong>Erro!</strong> Usuário já existente
									</div>											
								<?php		
									unset($_SESSION['user_status']);
										}
									}
								?>
								
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-envelope"></i>
												</span> 
												<input class="form-control" placeholder="Email" name="email" type="email" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Usuário" name="loginname" type="text" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" placeholder="Senha" name="senha" type="password" value="" required>
											</div>
										</div>
										<div class="form-group">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Cadastrar" />
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
            </div>
		<?php }else{	?>
					<div class="col-sm-4 col-md-4 col-md-offset-6">
						<table class="table">
							<tbody>
								<tr class="table-primary">
									<td colspan="2"><b>Informações Pessoais<b></td>
								</tr>
								<tr>
									<td>Nome</td><td><?php echo $_SESSION['loginname'] ?></td>
								</tr>
								<tr>
									<td>Email</td><td><?php echo $_SESSION['email_atual'] ?></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="2">
										<form action="logout.php" method="POST">
											<input type="submit" class="btn btn-lg btn-primary btn-block" value="Sair" name="logout"/>
										</form>
									</td>
								</tr>
							</tfoot>
						</table>
					</div>
		<?php }?>
		</div>
	</div>

    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-5 bg-dark" style="bottom: 0; position:absolute; width: 100%">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Your Website 2017</p>
      </div>
      <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </body>

</html>
