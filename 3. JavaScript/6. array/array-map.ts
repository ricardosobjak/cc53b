/**
 * map(): é um método que cria um novo array contendo os resultados
 * da invocação de uma função sobre cada elemento deste array.
 * 
 * Use map() quando: é preciso traduzir/mapear todos os elementos 
 * em um array para outro conjunto de valores.
*/


/*
    O que map() faz: percorre o array da esquerda 
    para a direita invocando uma função de retorno 
    em cada elemento com parâmetros. 
    Para cada chamada de retorno, o valor devolvido 
    se torna o elemento do novo array. Depois que todos
    os elementos foram percorridos, map() retorna 
    o novo array com todos os elementos “traduzidos”.
*/



/**
 * Parâmetros:
 * 
 * array.map( function( elem, index, array ) {
 *     ...
 * }, thisArg );
 * 
 * Parâmetro    Significado
 *  - elem:     Valor do elemento
 *  - index:    Índice em cada iteração, da esquerda para a direita
 *  - array:    Array original invocando o método
 *  - thisArg:  (opcional) Objeto que será referenciado como this no callback
 */



/**
 * EXEMPLO 1: Obtendo a raiz quadrada de cada elemento do array
 */
let arr = [1, 2, 3, 4];
let roots = arr.map(Math.sqrt);
console.log(roots);


/**
 * EXEMPLO 2: Transformando o array de fahrenheit em celcius.
 */

let fahrenheit = [0, 32, 45, 50, 75, 80, 99, 120];

// < ES6
let celcius1 = fahrenheit.map(
    function (elem) {
        return Math.round((elem - 32) * 5 / 9);
    }
);

// ES6
let celcius2 = fahrenheit.map( elem => Math.round( ( elem - 32 ) * 5 / 9 ) );

console.log(celcius1); //  [ -18, 0, 7, 10, 24, 27, 37, 49 ]
console.log(celcius2);



 

 /**
  * EXEMPLO 3: Criar uma função que gere um novo array 
  * contendo o valor dos elementos somados com a posição de seu índice.
  */
 let valores = [1,4,7,4,6];

 let valor_mais_indice = valores.map( (valor, indice, array) => (valor+indice) );
 console.log(valor_mais_indice);