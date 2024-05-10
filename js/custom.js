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

// Cadastrar registros em duas tabelas

const cadClienteForm = document.getElementById("cad-cliente-form")

// Receber o SELETOR da janela modal
const cadClienteMadal = new bootstrap.Modal(document.getElementById("cadClienteModal"));

// somente acessa o if quando existir o SELETOR "cad-usuario-for"
if (cadClienteForm) {
    cadClienteForm.addEventListener("submit", async (e) => {
        // nao permitir a atualização da pagina
        e.preventDefault();

        // console.log("Acessou a funcao cadastrar!");
        const dadosForm = new FormData(cadClienteForm);

        document.getElementById("cad-cliente-btn").value = "Salvando...";

        const dados = await fetch("cadastrar.php", {
            method: "POST",
            body: dadosForm
        });
        const resposta = await dados.json();

        // Acessa o IF quando nao cadastrar com sucesso
        if (!resposta['status']) {
            document.getElementById("msgAlertaErro").innerHTML = resposta['msg'];
        } else {
            document.getElementById("msgAlerta").innerHTML = resposta['msg'];
            cadClienteForm.reset();
            cadClienteMadal.hide();
            listarClientes(1);
        }
        document.getElementById("cad-cliente-btn").value = "Cadastrar";
    })
} 