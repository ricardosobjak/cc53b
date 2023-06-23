// URL base da API de dados da usuario

const URL = "http://localhost/Ecommerce/api/"

/**
 * Função getAll()
 * Objetivo: fazer uma requisição HTTP para obter
 * uma lista de usuarios em JSON e, posteriormente,
 * atualizar a tabela HTML
 */

function getAll() {
    // Cliente HTTP faz a requisição para a API
    fetch(`${URL}/usuario/get.php`)
        .then(res => res.json()) // Convertemos JSON em uma lista de OBJ javaScript
        .then(data => { // Atualiza a tabela HTML
            console.log(data);

            data.forEach(usuario => {
                addTableRow(usuario);
            });
        });
}


/**
 * Função: addTableRow
 * Objetivo: adicionar uma linha na tablea HTML
 */

function addTableRow(usuario) {
    const table = document.getElementById('tbusuario');

    // Criando uma linha para adicionar na tabela
    const tr = document.createElement('tr');

    // Primeira célula da linha
    const td1 = document.createElement('td');
    td1.innerHTML = usuario.id;

    // Segunda célula da tabela
    const td2 = document.createElement('td');
    td2.innerHTML = usuario.nome;

    // Terceira célula
    const td3 = document.createElement('td');
    td3.innerHTML = usuario.email;

    // Quarta célula
    const td4 = document.createElement('td');
    td4.innerHTML = usuario.senha;

    // Quinta célula
    const td5 = document.createElement('td');
    td5.innerHTML = usuario.nascimento;

    // Sexta célula
    const td6 = document.createElement('td');
    const tbRemove = document.createElement('button');
    tbRemove.innerHTML = "Excluir";
    tbRemove.onclick = () => {
        alert("Remover " + usuario.nome);
        deleteusuario(tr, usuario.id);
    };

    td6.appendChild(tbRemove);

    tr.appendChild(td1);
    tr.appendChild(td2);
    tr.appendChild(td3);
    tr.appendChild(td4);
    tr.appendChild(td5);
    tr.appendChild(td6);

    table.tBodies[0].appendChild(tr);

}

/**
 * Objetivo: deletar uma usuario na API e remover a linha da tabela
 */
function deleteusuario(tr, id) {
    console.log("deletando o ID", id);

    fetch(`${URL}/usuario/delete.php?id=${id}`)
        .then(res => {
            console.log(res);
            if (res.status == 200)
                tr.remove();
            else
                alert("Falha ao remover usuario" + id);
        })
        .catch(err => {
            console.log(err);
        })

}

/**
 * Função: save
 * Objetivo: Invocar a API, passando os dados do formulário (nome, email, nascimento...)
 */
function save() {
    // Obter a refência para os campos input
    const fNome = document.getElementById('fNome');
    const fEmail = document.getElementById('fEmail');
    const fSenha = document.getElementById('fsenha');
    const fNascimento = document.getElementById('fNascimento');

    // Criar o objeto representando uma usuario, contendo os valores dos inputs
    const usuario = {
        nome: fNome.value,
        email: fEmail.value,
        senha: fSenha.value,
        nascimento: fNascimento.value
    };


    // Invocar API
    fetch(`${URL}/usuario/create.php`, {
        body: JSON.stringify(usuario),
        method: 'POST',
        headers: {
            'Content-type': 'application/json'
        },
    })
        .then((res) => {
            console.log(res.text());
            if (res.status == 200 || res.status == 201) {
                alert("Salvo com sucesso!");

                //addTableRow(res.json());
                res.json().then(pes=>{addTableRow(pes)});
            } else alert("Falha ao salvar");
        });
}

// Infocando a função para obet a lista de usuarios
// e atualizar a tabela
getAll();