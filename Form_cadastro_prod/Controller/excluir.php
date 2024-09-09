<?php 
    // Inclui o arquivo de conexão com o banco de dados
    include_once "conexao.php";

    // Recebe o valor do parâmetro 'codigo' da URL e o sanitiza para evitar XSS (Cross-Site Scripting)
    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);

     // Cria a consulta SQL para excluir um registro da tabela 'produtos' baseado no 'prod_id'

    $sql = "DELETE FROM produtos where prod_id = $codigo";

    // Executa a consulta SQL
    $inserir = mysqli_query($conn, $sql);
        // Verifica se a execução da consulta foi bem-sucedida
        if($inserir){
        // Se a exclusão foi bem-sucedida, exibe um alerta e redireciona para a página inicial
         echo "
            <script>
                alert('Registro excluido');
                window.location.href='../index.php';
            </script>
         ";

        } else {
            // Se houve um erro ao executar a consulta, exibe um alerta de erro e redireciona para a página inicial
          echo "
            <script>
                alert('Erro ao excluir');
                window.location.href='../index.php';
            </script>";
         }
         
    // Fecha a conexão com o banco de dados
    mysqli_close($conn);



?>