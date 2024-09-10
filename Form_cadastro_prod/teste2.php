<?php 
    
    // Inclui o arquivo de conexão com o banco de dados
    include_once "Controller/conexao.php";
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de imagem</title>
</head>
<body>
    <form method="post" action="logimagem.php" enctype="multipart/form-data"">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required value=""> <br>
        <label for="imagem">Imagem: </label>
        <input type="file" name="imagem" id="imagem" accept=".jpg, .jpeg, .png" value=""><br>
        <button type="submit" name="submit">Enviar</button>
    </form>
    <br>
    <a href="teste2.php">Data</a>





</body>
</html>