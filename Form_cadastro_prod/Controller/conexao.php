<?php 
    // Inclui o arquivo de configuração, geralmente contendo a configuração da conexão com o banco de dados
    include_once "config.php";

    // Checa a conexão
    if ($conn->connect_errno) {
        // Se houver um erro de conexão, exibe uma mensagem de erro e encerra o script
        echo "Falha na conexão: " . $conn->connect_error;
        exit();
    }
    

    

?>