<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Contato</title>
        <meta charset="utf-8">
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
            <li class="nav-item active">
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
	


		
	<div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-6 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong><h2>Formulário de Contato</h2></strong>
					</div>
					<div class="panel-body">
						<form role="form" method="POST" action="contatoEmail.php">
							<fieldset>
					
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-envelope"></i>
												</span> 
												<input class="form-control" placeholder="Email" name="email" type="text" autofocus required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" placeholder="Nome" name="nome" type="text" required>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<textarea name="mensagem" rows=3 cols="100" placeholder="Mensagem"></textarea>
											</div>
										</div>
										<div class="form-group">
										<div class="input-group">
										<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
											<input type="reset" class="campo_submit" value="Limpar" />
											<input type="submit" value="Enviar">
										</div>	
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
                </div>
			</div>
		</div>
	
		
		
    </body>
</html>