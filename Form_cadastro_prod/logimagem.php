<?php 
    
    // Inclui o arquivo de conexão com o banco de dados
    include_once "Controller/conexao.php";
    
    $nome = $_POST["nome"];
   
    if($_FILES["imagem"]["name"] == ""){

    echo"<script> alert('Imagem nao existe'); document.location.href = 'logimagem.php';</script>";
   
    }else{

    $nomeImagem = $_FILES["imagem"]["name"];
    $tamanhoImagem = $_FILES["imagem"]["size"];
    $nometmp = $_FILES["imagem"]["tmp_name"];
    
    $validarImagem = ['jpg','png','jpeg'];
    $imagemExtensao = explode('.',$nomeImagem);
    $imagemExtensao = strtolower(end($imagemExtensao));

    if(!in_array($imagemExtensao,$validarImagem)){
    echo"<script> alert('extensão invalida'); document.location.href = 'logimagem.php';</script>";

    }else{ 
    if ($tamanhoImagem > 1000000){
    echo"<script> alert('muitao grande, meninao'); document.location.href = 'logimagem.php';</script>";

    }else{
    
    $novoNomeImagem = uniqid();
    $novoNomeImagem .= '.' . $imagemExtensao;
    move_uploaded_file($nometmp,'img/'. $novoNomeImagem);

    $query= "INSERT INTO ts2 (nome, imagem) VALUES ('$nome','$novoNomeImagem')";
    mysqli_query($conn, $query);
    echo"<script> alert('sucess add'); document.location.href = 'teste2.php';</script>";


    }

    }
    }

    
    


?>