const listarClientes = async (pagina) => {
    const dados = await fetch("listar.php?pagina=" + pagina);
    const resposta = await dados.json();
    // console.log(resposta);

    if (!resposta['status']) {
        document.getElementById("msgAlerta").innerHTML = resposta['msg'];
    } else {
        const conteudo = document.querySelector(".listar-clientes");
        if (conteudo) {
            conteudo.innerHTML = resposta['dados'];
        }
    }

}

listarClientes(1);