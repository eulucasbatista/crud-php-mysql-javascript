<?php

//Incluir conexão com o banco de dados

include_once "conexao.php";

//Receber os dados
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

//Validar o formulario
if(empty($dados['nome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o nome </p>"];
}else if(empty($dados['sobrenome'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o sobrenome</p>"];
}else if(empty($dados['email'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o email/p>"];
}else if(empty($dados['cpf'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o cpf</p>"];
}else if(empty($dados['codigo_p'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o codigo do produto</p>"];
}else if(empty($dados['nome_p'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o nome do produto</p>"];
}else if(empty($dados['valor_p'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher o valor do produto</p>"];
}else if(empty($dados['qtd_e'])){
    $retorna = ['status' => false, 'msg' => "<div class='alert-danger' role='alert'> Erro: necessário preencher a quantidade do produto</p>"];
}else{
    //Cadastrar no BD na primeira tabela
    $query_cliente = "INSERT INTO clientes (nome, sobrenome, email, cpf) VALUES (:nome, :sobrenome, :email, :scpf)";
    $cad_cliente = $conn->prepare($query_cliente);

    $retorna = ['status' => false, 'msg' => "<div class='alert-success' role='alert'> Cliente Cadastrado com sucesso </div>"];
}

echo json_encode($retorna);