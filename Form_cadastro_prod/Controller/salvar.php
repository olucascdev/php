<?php 
    include_once "conexao.php";

    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $nome = filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
    $valor = str_replace(",",".",filter_input(INPUT_GET, "valor",FILTER_SANITIZE_SPECIAL_CHARS));

    $sql = "INSERT INTO produtos VALUES(null, '$nome',$valor)";

    echo $sql;


    $inserir = mysqli_query($conn, $sql);
        if($inserir){
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
            </script>";
         }
    
    mysqli_close($conn);



?>