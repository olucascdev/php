<?php 
    include_once "conexao.php";

    $codigo = filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
    $sql = "DELETE FROM produtos where prod_id = $codigo";

    $inserir = mysqli_query($conn, $sql);
        if($inserir){
         echo "
            <script>
                alert('Registro excluido');
                window.location.href='../index.php';
            </script>
         ";

        } else {
          echo "
            <script>
                alert('Erro ao excluir');
                window.location.href='../index.php';
            </script>";
         }
    
    mysqli_close($conn);



?>