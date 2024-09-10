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

// Diretório onde as imagens serão salvas
$diretorio_imagens = '../img/';

// Verifica se uma imagem foi enviada
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] == UPLOAD_ERR_OK) {
    $extensao = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);
    $nome_imagem = uniqid() . '.' . $extensao;
    $caminho_imagem = $diretorio_imagens . $nome_imagem;

    // Move o arquivo para o diretório de destino
    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $caminho_imagem)) {
        echo "Imagem enviada com sucesso!";
    } else {
        echo "Erro ao mover a imagem!";
    }
} else {
    // Se não foi enviada uma nova imagem, define um padrão
    $caminho_imagem = '../img/default.png';
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