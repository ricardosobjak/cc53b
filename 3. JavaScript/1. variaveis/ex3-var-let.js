/**
 * Notas sobre let e var
 */


/**
 * 1) Declaração de variável depois de inicializá-la
 */

// Com 'var' = ok
a = 'Medianeira';
var a;

// Com 'let' = fail
b = "Cascavel";
let b;

/**
 * 2) Declarar uma variável repetidas vezes no código
 */

// Com 'var' = ok
var nameA = 'Chris';
var nameA = 'Bob';

// Com 'let' = fail
let nameB = 'Chris';
//let nameB = 'Bob';

// Com 'let', apenas assim
let nameC = 'Chris';
nameC = 'Bob';