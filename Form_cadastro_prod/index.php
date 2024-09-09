<?php 
    include_once "Controller/conexao.php";

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Projeto</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h2>Cadastro de produtos</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <img src="Imagens/produtos.png" alt="produto" class="img-produto">
            </div>
            <div class="col-8">
                <form method="GET" action="Controller/salvar.php" >
                    <div class="mt-3 form-floating">
                        <input type="number" class="form-control desabilitado" id="codigo" name="codigo" readonly value="<?php 
                        echo filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>">
                        <label for="codigo" class="form-label">Código</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php 
                        echo filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>">
                        <label for="nome" class="form-label">Nome do Produto</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="valor" name="valor" value="<?php 
                        echo filter_input(INPUT_GET, "valor", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>">
                        <label for="valor" class="form-label">Valor</label>
                    </div>
                    <div class="mt-3 form-floating">
                        <div class="row">
                            <div class="col">
                                <a href="index.php"></a>
                                <button type="button" class="btn btn-primary form-control botaoNovo">Novo</button>
                                </a>
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary form-control botaoSalvar">Salvar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container mt-3">
        <div class="row">
            <div class="col">
                <h2>Produtos Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Valor</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = 'Select * from produtos';
                            $pesquisar = mysqli_query($conn, $sql);
                            while ($linha = $pesquisar->fetch_assoc()){
                                echo "<tr>
                                        <td>".$linha['prod_id']."</td>
                                        <td>".$linha['prod_nome']."</td>
                                        <td>".$linha['prod_valor']."</td>
                                        <td>
                                        <a href='?
                                        codigo=".$linha['prod_id']."&
                                        nome=".$linha['prod_nome']."&
                                        valor=".$linha['prod_valor']."&'>

                                        <img src='Imagens/editar.png' class='imgTabela'>

                                        </td>
                                        <td>

                                        <a href='Controller/excluir.php?codigo=".$linha['prod_id']."'>
                                            <img src='Imagens/excluir.png' class='imgTabela'>
                                        </a>

                                        </td>
                                      </tr>";
                            }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>








    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>