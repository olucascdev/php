<?php 
    // Inclui o arquivo de conexão com o banco de dados
    include_once "conexao.php";
    // Recebe e sanitiza os parâmetros da URL
    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    // Substitui vírgulas por pontos no valor e sanitiza
    $valor = str_replace(",",".",filter_input(INPUT_GET, "valor",FILTER_SANITIZE_SPECIAL_CHARS));
        // Verifica se o código é maior que 0 para decidir se é uma atualização ou inserção
        if($codigo > 0){
            // Atualiza o produto existente com base no código
            $sql = "UPDATE produtos SET prod_nome='$nome',prod_valor= $valor WHERE prod_id=$codigo;";

        } else {
            // Insere um novo produto na tabela
            $sql = "INSERT INTO produtos VALUES(null, '$nome',$valor)";
        }

    echo $sql;

        // Executa a consulta SQL
    $inserir = mysqli_query($conn, $sql);

        if($inserir){
            // Verifica se a consulta foi executada com sucesso
         echo "
            <script>
                alert('Salvo com sucesso');
                window.location.href='../index.php';
            </script>
         ";

        } else {
            // Se houver um erro, exibe uma mensagem de erro e redireciona para a página inicial
          echo "
            <script>
                alert('Erro ao Salvar');
                window.location.href='../index.php';
            </script>";
         }
    // Fecha a conexão com o banco de dados
    mysqli_close($conn);



?>