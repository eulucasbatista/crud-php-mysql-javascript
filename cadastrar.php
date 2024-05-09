<?php

//Incluir conexão com o banco de dados

include_once "conexao.php";

//Receber os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Validar o formulario
if(empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o nome </div>"];
}else if(empty($dados['sobrenome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o sobrenome</div>"];
}else if(empty($dados['email'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o email</div>"];
}else if(empty($dados['cpf'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o cpf</div>"];
}else if(empty($dados['codigo_produto'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o codigo do produto</div>"];
}else if(empty($dados['nome_produto'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o nome do produto</div>"];
}else if(empty($dados['valor_produto'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o valor do produto</div>"];
}else if(empty($dados['qtd_estoque'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher a quantidade do produto</div>"];
}else{
    //Cadastrar no BD na primeira tabela
    $query_cliente = "INSERT INTO clientes (nome, sobrenome, email, cpf) VALUES (:nome, :sobrenome, :email, :cpf)";
    $cad_cliente = $conn->prepare($query_cliente);
    $cad_cliente->bindParam(':nome', $dados['nome']);
    $cad_cliente->bindParam(':sobrenome', $dados['sobrenome']);
    $cad_cliente->bindParam(':email', $dados['email']);
    $cad_cliente->bindParam(':cpf', $dados['cpf']);
    $cad_cliente->execute();

    // verifica se cadastrou o produto
    if($cad_cliente->rowCount()){
       //Recuperar ultimo id
    $id_cliente = $conn->lastInsertId(); 

    //Cadastrar no BD na segunda tabela
    $query_produto = "INSERT INTO produtos (codigo_produto, nome_produto, valor_produto, qtd_estoque, clientes_id) VALUES(:codigo_produto, :nome_produto, :valor_produto, :qtd_estoque, :clientes_id)";
    $cad_produto = $conn->prepare($query_produto);
    $cad_produto->bindParam(':codigo_produto', $dados['codigo_produto']);
    $cad_produto->bindParam(':nome_produto', $dados['nome_produto']);
    $cad_produto->bindParam(':valor_produto', $dados['valor_produto']);
    $cad_produto->bindParam(':qtd_estoque', $dados['qtd_estoque']);
    $cad_produto->bindParam(':clientes_id', $id_cliente);
    $cad_produto->execute();


    // verifica se cadastrou o produto
    if($cad_produto->rowCount()){
        $retorna = ['status' => false, 'msg' => "<div class='alert-success' role='alert'> Cliente Cadastrado com sucesso </div>", 'id_cliente' => $id_cliente];
    }else {
        $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Clinte não cadastrado com sucesso</div>"];
    }
        
    }else {
        $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Clinte não cadastrado com sucesso</div>"];
    }
    
}

echo json_encode($retorna);