<?php 
    
    // Inclui o arquivo de conexão com o banco de dados
    include_once "Controller/conexao.php";
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de imagem</title>
</head>
<body>
    <form method="post" action="logimagem.php" enctype="multipart/form-data"">
        <label for="nome">Nome: </label>
        <input type="text" name="nome" id="nome" required value=""> <br>
        <label for="imagem">Imagem: </label>
        <input type="file" name="imagem" id="imagem" accept=".jpg, .jpeg, .png" value=""><br>
        <button type="submit" name="submit">Enviar</button>
    </form>
    <br>

    <div class="container mt-3">
         <!-- Seção de lista de produtos cadastrados -->
        <div class="row">
            <div class="col">
                <h2>Produtos Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Tabela para exibir produtos cadastrados -->
                <table border = 1 cellspacing = 0 cellpadding = 10>
                        <tr>
                            <td>Código</td>
                            <td>Nome do Produto</td>
                            <td>Imagem</td>
                        </tr>
                        <?php 
                        $i = 1;
                        $rows = mysqli_query($conn, "SELECT * FROM ts2 ORDER BY id DESC");
                        ?>
                        <?php foreach($rows as $row) : ?>
                        <tr>
                           <td><?php echo $i++; ?></td>
                           <td><?php echo $row["nome"]; ?></td> <!-- Mudar o nome para name caso der erro-->
                           <td><img src="img/<?php echo $row['imagem']; ?>"  width="64px" title="<?php echo $row['imagem']; ?>"> </td>     

                        </tr>
                        <?php endforeach;?>   
                </table>
            </div>
        </div>

    </div>





</body>
</html>