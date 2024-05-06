<?php 

// incluir a conexão com o banco de dados
include_once "conexao.php";

//Recener a pagina
$pagina = filter_input(INPUT_GET, "pagina", FILTER_SANITIZE_NUMBER_INT);

if(!empty($pagina)) {
    // Calcular inicio da visualização

    $qnt_result_pg = 2; // Quantidade de registros por pagina
    $inicio = ($pagina * $qnt_result_pg) - $qnt_result_pg;
    
// Criar a Query para recuperar os registros do BD
// Testar erro na query =  WHERE id = 100
$query_clientes = "SELECT clientes.id, clientes.nome AS cliente_nome, clientes.sobrenome, clientes.email, clientes.cpf,
                    produtos.codigo_produto, produtos.nome_produto, produtos.valor_produto, produtos.qtd_estoque
                    FROM clientes
                    LEFT JOIN produtos ON produtos.clientes_id = clientes.id
                    ORDER BY clientes.id ASC
                    LIMIT $inicio,  $qnt_result_pg";
$result_clientes = $conn->prepare($query_clientes);
$result_clientes->execute();

if (($result_clientes)and ($result_clientes->rowCount() !=0)) {
    $dados ="<table class='table table-striped tabler-bordered table-hover'>";
    $dados .="<thead>";
    $dados .="<tr>";
    $dados .="<th>ID</th>";
    $dados .="<th>Nome</th>";
    $dados .="<th>Sobrenome</th>";
    $dados .="<th>Email</th>";
    $dados .="<th>CPF</th>";
    $dados .="<th>Codigo Produto</th>";
    $dados .="<th>Nome Produto</th>";
    $dados .="<th>Valor Produto</th>";
    $dados .="<th>Quantidade em Estoque</th>";
    $dados .="<th>Ações</th>";
    $dados .="</tr>";
    $dados .="</thead>";
    $dados .="<tbody>";
    while($row_cliente = $result_clientes->fetch(PDO::FETCH_ASSOC)){
        extract($row_cliente);
        $dados .="<tr>";
        $dados .="<td>$id</td>";
        $dados .="<td>$cliente_nome</td>";
        $dados .="<td>$sobrenome</td>";
        $dados .="<td>$email</td>";
        $dados .="<td>$cpf</td>";
        $dados .="<td>$codigo_produto</td>";
        $dados .="<td>$nome_produto</td>";
        $dados .="<td>$valor_produto</td>";
        $dados .="<td>$qtd_estoque</td>";
        $dados .="<td>Visualizar Editar Apagar</td>";
        $dados .="</tr>";
    }
    $dados .="</tbody>";
    $dados .= "</table>";

    // Paginacao - Somar  a quantidade de registros que ha no BD
    $query_pg =  "SELECT COUNT(id) AS num_result FROM clientes";
    $result_pg = $conn->prepare($query_pg);
    $result_pg->execute();
    $row_pg = $result_pg->fetch(PDO::FETCH_ASSOC);

   //Quantidade de paginas
    $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);

    $max_links = 2;

    $dados .= "<nav aria-label='Page navigation example'>";
    $dados .= "<ul class='pagination pagination-sm justify-content-center'>";

    $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarClientes(1)'>Primeira</a></li>";

    for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina -1; $pag_ant++){
        if($pag_ant >= 1 ){
            $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarClientes($pag_ant)'>$pag_ant</a></li>";
        }
    }

    $dados .= "<li class='page-item active' aria-current='page'>";
    $dados .= "<a class='page-link' href='#'>$pagina</a>";
    $dados .= "</li>";

    for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++ ){
        if($pag_dep <= $quantidade_pg) {
        $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarClientes($pag_dep)'>$pag_dep</a></li>";
        }
    }


    $dados .= "<li class='page-item'><a class='page-link' href='#' onclick='listarClientes($quantidade_pg)'>Última</a></li>";
    
    $dados .= "</ul>";
    $dados .= "</nav>";
    
    $retorna = ['status' => true, 'dados' => $dados, 'quantidade_pg' => $quantidade_pg];
}else {
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'> Erro:nenhum usuario encontrando! </p>"];
}
}else{
    $retorna = ['status' => false, 'msg' => "<p style='color: #f00;'> Erro:nenhum usuario encontrando! </p>"];

}
echo json_encode($retorna);