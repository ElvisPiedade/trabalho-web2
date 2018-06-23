<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>Contato</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Formulário de Contato</h1>      
        <form method="POST" action="contatoEmail.php">
            <label>Nome<sup class="asteristico">*</sup></label>
            <input type="text" name="nome" placeholder="Nome completo">
            <br>
            <br>
            <label>Email<sup class="asteristico">*</sup></label>
            <input type="email" name="email" placeholder="Email">
            <br>
            <br>
            <label>Mensagem<sup class="asteristico">*</sup></label>
            <textarea name="mensagem" rows=3 cols="50"></textarea>
            <br>
            <br>
            <input type="reset" class="campo_submit" value="Limpar" />
            <input type="submit" value="Enviar">
            <br>
            <br>
            <small class="asteristico">* Campos obrigatorios</small>
        </form>
    </body>
</html>