/**
 * Use reduce() quando: é preciso encontrar um valor 
 * cumulativo ou concatenado com base em elementos de todo o array.
 * 
 * O que reduce() faz: como map(), reduce() percorre o array 
 * da esquerda para a direita invocando uma função de retorno 
 * em cada elemento. O valor retornado é o valor acumulado 
 * passado de callback para callback. 
 * Depois de todos os elementos terem sido avaliados, 
 * reduce() retorna o valor acumulado/concatenado.
 * 
*/



/**
 * Parâmetros:
 * 
 * array.reduce( function( prevVal, elem, index, array ) {
 *     ...
 * }, initialValue );
 * 
 *  Parâmetro	    Significado
 *  - prevVal:      Valor acumulado retornado em cada iteração
 *  - elem:         Valor do elemento
 *  - index:        Índice em cada iteração, da esquerda para a direita
 *  - array:        Array original invocando o método
 *  - initialValue: (opcional) Objeto usado como primeiro argumento 
 *                  na primeira iteração (mais à esquerda)
 */



/**
 * EXEMPLO 1: somando os launches de cada país
 */
var rockets = [
    { country: 'Russia', launches: 32 },
    { country: 'US', launches: 23 },
    { country: 'China', launches: 16 },
    { country: 'Europe(ESA)', launches: 7 },
    { country: 'India', launches: 4 },
    { country: 'Japan', launches: 3 }
];

let sum = rockets.reduce(
    function (prevVal, elem) {
        return prevVal + elem.launches;
    },
    0
);

// ES6
let sumES6 = rockets.reduce((prevVal, elem) => prevVal + elem.launches, 0);

console.log(sum);
console.log(sumES6);