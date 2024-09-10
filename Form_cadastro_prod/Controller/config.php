<?php 
    // Define as credenciais e detalhes de conexão com o banco de dados
    $servidor ='localhost'; // Endereço do servidor do banco de dados, geralmente 'localhost' para servidores locais
    $usuario = 'root'; // Nome de usuário para acessar o banco de dados
    $senha = '';    // Senha para o usuário do banco de dados
    $banco = 'teste2'; // Nome do banco de dados ao qual se conectar
    

    // Cria uma conexão com o banco de dados usando a função mysqli_connect
    $conn = mysqli_connect($servidor,$usuario,$senha,$banco);
    

?>