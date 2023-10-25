// Importações
const express = require("express");
const cors = require('cors');

// Criar uma instância do Express
const app = express();

app.use(cors());
app.use(express.json()); 

// Colocar a app para executar na porta 3000
const PORT = 3000;
app.listen(PORT, () => {
    console.log(`APP executando na porta ${PORT}`)
});

app.get("/", async (req, res) => {
    return res.send("API na escuta!!");
});

app.use("/pessoa", require('./routes/pessoa'));
app.use("/categoria", require('./routes/categoria'));
//app.use("/receita", require('./routes/receita'));