<?php 
    // Inclui o arquivo de conexão com o banco de dados
    include_once "conexao.php";
    // Recebe e sanitiza os parâmetros da URL
    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    // Substitui vírgulas por pontos no valor e sanitiza
    $valor = str_replace(",",".",filter_input(INPUT_GET, "valor",FILTER_SANITIZE_SPECIAL_CHARS));
    $imagem = '';
    if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
        $imagem_tmp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = $_FILES['imagem']['name'];
        $imagem_ext = strtolower(pathinfo($imagem_nome, PATHINFO_EXTENSION));
        $imagem_destino = 'uploads/' . uniqid() . '.' . $imagem_ext;
        move_uploaded_file($imagem_tmp, $imagem_destino); // Move o arquivo para o diretório de destino
    } else {
        $imagem_destino = ''; // Se não houver imagem, defina um valor padrão ou nulo
    }
    
        // Verifica se o código é maior que 0 para decidir se é uma atualização ou inserção
        if($codigo > 0){
            // Atualiza o produto existente com base no código
            $sql = "UPDATE produtos SET prod_nome='$nome',prod_valor= $valor, foto='$imagem_destino' WHERE prod_id=$codigo;";

        } else {
            // Insere um novo produto na tabela
            $sql = "INSERT INTO produtos (prod_nome, prod_valor, foto) VALUES ('$nome', $valor, '$imagem_destino')";

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