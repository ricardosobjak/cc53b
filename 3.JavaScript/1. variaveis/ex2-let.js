'use strict';

/**
 * Definição de variáveis
 */
let a, b;
console.log(a,b);


/**
 * Atribuição de valores nas variáveis
 */
a = 1, b = 2; // Variáveis a e b foram definidas anteriormente
console.log(a,b);

/** 
 * Definição de variáveis e atribuição de valores 
 */

let nome = "Juca"; // String
let idade = 30; // Número
let solteiro = true; // Booleano
let hobbies = ["Natação", "Filme"]; // Array
let endereco = { logradouro: "Rua Acre", numero: "1234", cep: "12345-000" } // Objeto

console.log(nome, idade, solteiro, hobbies, endereco);


/**
 * Declaração de variável após a atribuição
 * 
 * Obs.: Com let não funciona
 */
cidade = 'Medianeira';
let cidade;
console.log(cidade);