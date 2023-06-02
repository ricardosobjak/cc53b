//'use strict';

/**
 * Definição de variáveis
 */
var a, b;
console.log(a,b);


/**
 * Atribuição de valores nas variáveis
 */
a = 1, b = 2; // Variáveis a e b foram definidas anteriormente
console.log(a,b);


a = 10; // Alteração de valor
b = 20; // Alteração de valor
c = 30; // Global implícito (variável c não havia sido definida)
console.log(a,b,c);


/** 
 * Definição de variáveis e atribuição de valores 
 */

var nome = "Juca"; // String
var idade = 30; // Número
var solteiro = true; // Booleano
var hobbies = ["Natação", "Filme"]; // Array
var endereco = { logradouro: "Rua Acre", numero: "1234", cep: "12345-000" } // Objeto

console.log(nome, idade, solteiro, hobbies, endereco);


/**
 * Declaração de variável após a atribuição
 */
cidade = 'Medianeira';
var cidade;
console.log(cidade);