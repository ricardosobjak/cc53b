const connection = require('../connection');

const TABLE = 'tb_pessoa'

// Consultar as pessoas no DB
const getAll = async () => {
    const [query] = await connection.execute(
        `SELECT id, nome, email FROM ${TABLE}`
    );

    return query;
}

// Obter uma pessoa pelo ID
const getById = async (id) => {
    const [query] = await connection.execute(
        `SELECT id, nome, email FROM ${TABLE} 
        WHERE id = ${id} LIMIT 1`
    );

    return query;
}

// Inserir uma pessoa no DB
const create = async (pessoa) => {
    const [query] = await connection.execute(
        `INSERT INTO ${TABLE} (nome, email, senha) 
        VALUES (
            "${pessoa.nome}",
            "${pessoa.email}",
            "${pessoa.senha}"
        )`
    );
    return query;
}

// Atualizar uma pessoa no DB
const update = async (id, pessoa) => {
    const [query] = await connection.execute(
        `UPDATE ${TABLE} SET 
            nome="${pessoa.nome}",
            email="${pessoa.email}"
         WHERE id=${id}`
    );
    return query;
}

// Deletar uma pessoa no DB
const remove = async (id) => {
    const [query] = await connection.execute(
        `DELETE FROM ${TABLE} WHERE id=${id}`
    );
    return query;
}


module.exports = { getAll, create, getById, update, remove };