<?php
require 'init.php';
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuário</title>
    </head>
    <body>
        <h1>Sistema de Cadastro</h1>
        <h2>Cadastro de Usuário</h2>
        <form action="add.php" method="post">
			Nome
  
            <input type="text" name="name" id="name">
      
            <br>
			Cor
            <input type="text" name="color" id="color">
            <br>
     
            <br>
			Preço
			 <input type="text" name="price" id="price">
            <br><br>
			Quantidade
			 <input type="text" name="birthdate" id="birthdate">
			<br>
            <input type="submit" value="Cadastrar">
        </form>
    </body>
</html>
