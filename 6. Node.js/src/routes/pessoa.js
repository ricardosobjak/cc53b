const express = require('express');
const router = express.Router();
const pessoaRepository = require('../repository/pessoa');

/**
 * Obter todas as pessoas
 */
router.get("/", async (req, res) => {
    const pessoas = await pessoaRepository.getAll();
    return res.json(pessoas);
});

/**
 * Obter uma pessoa pelo ID
 */
router.get("/:id", async (req, res) => {
    const id = req.params.id;

    const pessoa = await pessoaRepository.getById(id);

    if(pessoa.length == 0) { // Verificar se existe uma pessoa
        // Envia uma mensagem de código 404 (Not found)
        return res.status(404).json({ message: "Pessoa não encontrada"});
    }

    return res.json(pessoa[0]);
});


/**
 * Criar uma pessoa
 */
router.post("/", async(req, res) => {
    console.log(req.body);

    // Executa a inserção na tabela de pessoa no DB
    const dbResult = await pessoaRepository.create(req.body);

    // Verificando se alguma pessoa foi "afetada" na tabela
    if(dbResult.affectedRows == 0) {
        // Envia uma mensagem de código 400 (Bad Request)
        return res.status(400).json({ message: "Falha ao inserir pessoa"});
    }

    req.body.id = dbResult.insertId;
    return res.json(req.body);
})

/**
 * Atualizar uma pessoa
 */
router.put("/:id", async(req, res) => {
    const {id} = req.params; // Obtendo o ID passada pela URL
    const pessoa = req.body; // Obtendo o JSON do corpo da requisição

    // Busca a pessoa no DB, pelo ID
    const pessoaDB = await pessoaRepository.getById(id);
    
    if(pessoaDB.length == 0) { // Verificar se existe uma pessoa
        // Envia uma mensagem de código 404 (Not found)
        return res.status(404).json({ message: "Pessoa não encontrada"});
    }

    // Atualizar a tabela de pessoas no DB
    const dbResult = await pessoaRepository.update(id, pessoa);

    // Verificando se alguma pessoa foi "afetada" na tabela
    if(dbResult.affectedRows == 0) {
        // Envia uma mensagem de código 400 (Bad Request)
        return res.status(400).json({ message: "Falha ao atualizar pessoa"});
    }

    // Devolve a resposta em caso de sucesso
    pessoa.id = pessoaDB[0].id;
    return res.json(pessoa); // Envia a mensagem de código 200 (Ok)
})


/**
 * Remover uma pessoa
 */
router.delete("/:id", async(req, res) => {
    const {id} = req.params; // Obtém o ID enviado na URL

    // Busca a pessoa no DB, pelo ID
    const pessoaDB = await pessoaRepository.getById(id);

    if(pessoaDB.length == 0) { // Verificar se existe uma pessoa
        // Envia uma mensagem de código 404 (Not found)
        return res.status(404).json({ message: "Pessoa não encontrada"});
    }

    // Executa a operação na tabela de pessoas no DB
    const dbResult = await pessoaRepository.remove(id);

    // Verificando se alguma pessoa foi "afetada" na tabela
    if(dbResult.affectedRows == 0) {
        // Envia uma mensagem de código 400 (Bad Request)
        return res.status(400).json({ message: "Falha ao deletar pessoa"});
    }

    // Em caso de sucesso, devolve uma mensagem de status 200 (Ok)
    return res.json({ message: "Pessoa deletada"});
})


module.exports = router;