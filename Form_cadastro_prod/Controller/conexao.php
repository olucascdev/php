<?php 
    include_once "config.php";

    // Checa a conexão
    if ($conn->connect_errno) {
        echo "Falha na conexão: " . $conn->connect_error;
        exit();
    }
    

    

?>