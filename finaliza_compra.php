<?php
	session_start();
	if(!isset($_SESSION['loginname'])){
		foreach($_SESSION['carrinho'] as $key => $value){

			$total += $_SESSION['carrinho'][$key]['c_qtd']*$_SESSION['carrinho'][$key]['preco'];
		}
	}
	

        // Destinatário
        $para = "eccomerce.ifrs@gmail.com";//$_SESSION['email_atual'];

        // Assunto do e-mail
        $assunto = "Detalhes de sua compra";

        // Campos do formulário de contato
        $nome = "elvis";//$_SESSION['loginname'];
        $email = "eccomerce.ifrs@gmail.com";//$_SESSION['email_atual'];
 
        // Monta o corpo da mensagem com os campos
        $corpo = "<html><body>";
        $corpo .= $_POST['compras'];
        $corpo .= "</body></html>";

        // Cabeçalho do e-mail
        $email_headers = implode("\n", array("From: $nome", "Reply-To: $email", "Subject: $assunto", "Return-Path: $email", "MIME-Version: 1.0", "X-Priority: 3", "Content-Type: text/html; charset=UTF-8"));

        //Verifica se os campos estão preenchidos para enviar então o email
        if (!empty($nome) && !empty($email)) {
            mail($para, $assunto, $corpo, $email_headers);
			unset($_SESSION['carrinho']);
            $msg = "Sua mensagem foi enviada com sucesso.";
            echo "<script>alert('$msg');window.location.assign('http://localhost/trabalho%20web2/index.php');</script>";
        } else {
            $msg = "Erro ao enviar a mensagem.";
            echo "<script>alert('$msg');window.location.assign('http://localhost/trabalho%20web2/contato.php');</script>";
        }

?>
					