<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Listar duas tabelas</title>
</head>
<div>

    <body>
        <div class="container">
            <div class="row mt-4 mb-2f">
                <div class="col-lg-12 d-flex justify-content-between align-items-center">
                    <h4>Listar Clientes e Produtos </h4>
                    <div>
                        <button type="button" class="btn btn-outline-success btn-sm" data-bs-toggle="modal"
                            data-bs-target="#cadClienteModal">Cadastrar</button>
                    </div>
                </div>
            </div>

            <span id="msgAlerta"></span>

            <div class="row">
                <div class="col-lg-12">
                    <span class="listar-clientes"></span>
                </div>
            </div>

            <!-- Inicio Modal cadastar Cliente e produto -->
            <div class="modal fade" id="cadClienteModal" tabindex="-1" aria-labelledby="cadClienteModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="cadClienteModalLabel">Cadastrar Cliente e Produto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="row g-3" id="cad-cliente-form">
                                <div class="col-12">
                                    <label for="nome" class="form-label">Nome</label>
                                    <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome">
                                </div>

                                <div class="col-12">
                                    <label for="sobrenome" class="form-label">Sobrenome</label>
                                    <input type="text" name="sobrenome" class="form-control" id="sobrenome"
                                        placeholder="Sobrenome">
                                </div>

                                <div class="col-12">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="email"
                                        placeholder="Email">
                                </div>

                                <div class="col-12">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" name="cpf" class="form-control" id="cpf" placeholder="CPF">
                                </div>

                                <div class="col-12">
                                    <label for="codigo_produto" class="form-label">Codigo Produto</label>
                                    <input type="number" name="codigo_produto" class="form-control" id="codigo_produto"
                                        placeholder="Código Produto">
                                </div>

                                <div class="col-12">
                                    <label for="nome_produto" class="form-label">Nome Produto</label>
                                    <input type="text" name="nome_produto" class="form-control" id="nome_produto"
                                        placeholder="Nome Produto">
                                </div>

                                <div class="col-12">
                                    <label for="valor_produto" class="form-label">Valor Produto</label>
                                    <input type="text" name="valor_produto" class="form-control" id="valor_produto"
                                        placeholder="Valor Produto">
                                </div>

                                <div class="col-12">
                                    <label for="qtd_estoque" class="form-label">Quantidade Estoque</label>
                                    <input type="text" name="qtd_estoque" class="form-control" id="qtd_estoque"
                                        placeholder="Quantidade Estoque">
                                </div>

                                <div class="col-12">
                                    <input type="submit" class="btn btn-outline-success btn-sm" id="cad-cliente-btn"
                                        value="Cadastrar">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Fim Modal cadastar Cliente -->
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous">
            </script>
            <script src="js/custom.js"></script>

    </body>
</div>

</html>