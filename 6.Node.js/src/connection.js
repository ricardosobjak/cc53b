const mysql = require("mysql2/promise");

const connection = mysql.createPool({
    host: "localhost",
    port: 3306,
    user: "root",
    password: "",
    database: "db_cc53b"
});

module.exports = connection;