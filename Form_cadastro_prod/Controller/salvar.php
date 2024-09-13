<?php 

include_once "conexao.php";
    

// Recebe os dados do formulário
$codigo = filter_input(INPUT_POST, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
$nome = filter_input(INPUT_POST, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
$valor = filter_input(INPUT_POST, "valor", FILTER_SANITIZE_SPECIAL_CHARS);

// Verifica se o valor não está nulo antes de aplicar o str_replace
if (!is_null($valor)) {
    $valor = str_replace(",", ".", $valor);
}


// Verifica se os campos obrigatórios estão preenchidos
if (!empty($nome) && !empty($valor)) {
    // Verifica se é uma atualização ou inserção
    if ($codigo > 0) {
        // Atualiza o produto existente
        $sql = "UPDATE produtos SET prod_nome='$nome', prod_valor=$valor, prod_imagem='$caminho_imagem' WHERE prod_id=$codigo;";
    } else {
        // Insere um novo produto
        $sql = "INSERT INTO produtos (prod_nome, prod_valor, prod_imagem) VALUES ('$nome', $valor, '$caminho_imagem')";
    }

    // Executa a query
    $inserir = mysqli_query($conn, $sql);

    if ($inserir) {
        echo "
            <script>
                alert('Salvo com sucesso');
                window.location.href='../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Erro ao Salvar');
                window.location.href='../index.php';
            </script>
        ";
    }
} else {
    echo "
        <script>
            alert('Preencha todos os campos!');
            window.location.href='../index.php';
        </script>
    ";
}

mysqli_close($conn);



?>