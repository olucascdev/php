<?php 
    // Inclui o arquivo de conexão com o banco de dados
    include_once "Controller/conexao.php";
    
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Link para o CSS do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>Projeto</title>
</head>
<body>
    <div class="container">
        <!-- Seção de título do formulário -->
        <div class="row">
            <div class="col">
                <h2>Cadastro de produtos</h2>
            </div>
        </div>
        <div class="row">
            <!-- Seção da imagem do produto -->
            <div class="col-4">
                <img src="Imagens/produtos.png" alt="produto" class="img-produto">
            </div>
            <div class="col-8">
                <!-- Campo para código do produto (somente leitura) -->
                <form method="GET" action="Controller/salvar.php" >
                    <div class="mt-3 form-floating">
                        <input type="number" class="form-control desabilitado" id="codigo" name="codigo" readonly value="<?php 
                        echo filter_input(INPUT_GET, "codigo", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>">
                        <label for="codigo" class="form-label">Código</label>
                    </div>
                     <!-- Campo para nome do produto -->
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="nome" name="nome" value="<?php 
                        echo filter_input(INPUT_GET, "nome", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>">
                        <label for="nome" class="form-label">Nome do Produto</label>
                    </div>
                     <!-- Campo para valor do produto -->
                    <div class="mt-3 form-floating">
                        <input type="text" class="form-control" id="valor" name="valor" value="<?php 
                        echo filter_input(INPUT_GET, "valor", FILTER_SANITIZE_SPECIAL_CHARS);
                        ?>">
                        <label for="valor" class="form-label">Valor</label>
                    </div>

                    <div class="mt-3 form-floating">
                        <input type="file" class="form-control" id="imagem" name="imagem">
                        <label for="imagem" class="form-label">Imagem</label>
                    </div>

                    <!-- Botões para novo e salvar -->
                    <div class="mt-3 form-floating">
                        <div class="row">
                            <div class="col">
                                <!-- Botão "Novo" (atualmente não redireciona para a mesma pagina) -->
                                <a href="index.php"></a>
                                <button type="button" class="btn btn-primary form-control botaoNovo">Novo</button>
                                </a>
                            </div>
                            <!-- Botão "Salvar" para enviar o formulário -->
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
         <!-- Seção de lista de produtos cadastrados -->
        <div class="row">
            <div class="col">
                <h2>Produtos Cadastrados</h2>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <!-- Tabela para exibir produtos cadastrados -->
                <table class="table table-light table-hover">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome do Produto</th>
                            <th>Valor</th>
                            <th>Imagem</th>
                            <th>Editar</th>
                            <th>Excluir</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            // Consulta SQL para selecionar todos os produtos
                            $sql = 'Select * from produtos';
                            // Executa a consulta no banco de dados
                            $pesquisar = mysqli_query($conn, $sql);
                            // Itera sobre cada linha de resultado da consulta
                            while ($linha = $pesquisar->fetch_assoc()){
                                $imagem = isset($linha['prod_imagem']) ? $linha['prod_imagem'] : 'Imagens/default.png';
                                // Exibe cada produto em uma linha da tabela
                                echo "<tr>
                                        <td>".$linha['prod_id']."</td>
                                        <td>".$linha['prod_nome']."</td>
                                        <td>".$linha['prod_valor']."</td>
                                        <td>
                                            <img src='".$imagem."' alt='Imagem do produto' class='img-thumbnail' style='width: 100px; height: auto;'>
                                        </td>
                                        <td>
                                            <a href='?codigo=".$linha['prod_id']."&nome=".$linha['prod_nome']."&valor=".$linha['prod_valor']."'>
                                                <img src='Imagens/editar.png' class='imgTabela'>
                                            </a>
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







    <!-- Script para o funcionamento do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>    
</body>
</html>