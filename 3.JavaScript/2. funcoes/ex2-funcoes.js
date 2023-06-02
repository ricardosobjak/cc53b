/**
 * Funções nomeadas
 */

/**
 * Definição da função showMessage
 */
function showMessage() {
    console.log("Bem vindo!")
};

showMessage(); // Invocação da função

/**
 * Definição da função showMessage2
 * Notação arrow => ECMAScript 2015
 */
const showMessage2 = () => { console.log("Bem vindo denovo!") };

showMessage2(); // Mostra: Bem vindo denovo!


/**
 * Função com recebimento de parâmetro
 */
function showSoma(a, b) {
    console.log(a + b);
}
showSoma(1, 4); // Mostra 5


/**
 * Função com recebimento de parâmetros e retorno de valor.
 * Definição de valores default nos parâmetros;
 */
function soma(a = 0, b = 0) {
    return a + b;
}
console.log(soma(45, 5)); // Mostra 50
console.log(soma(10)); // Mostra 10
console.log(soma()); // Mostra 0

/**
 * Função interna (quadrado)
 * 
 * A função interna 'quadrado' foi definida dentro da função 'somaQuadrados'
 */
function somaQuadrados(a, b) {

    // Definição da função interna "quadrado"
    function quadrado(x) {
        return x * x;
    }
    return quadrado(a) + quadrado(b);
};
console.log(somaQuadrados(5, 2)); // Mostra 29

/**
 * Função interna (quadrado), usando a notação arrow (ECMAScript 2015)
 * 
 * A função interna 'quadrado' foi definida dentro da função 'somaQuadrados'
 */
const somaQuadrados2 = (a, b) => {
    // Definição da função interna "quadrado"
    const quadrado = x => x * x;
    return quadrado(a) + quadrado(b);
};
console.log(somaQuadrados2(5, 2)); // Mostra 29


/**
 * Funções recursivas
 */
function loop(x) {
    if (x >= 10) return;
    loop(x + 1);
};

//Using ECMAScript 2015 arrow notation
const loop2 = x => {
    if (x >= 10) return;
    loop2(x + 1);
};

function somaRecursiva(x) {
    if (x <= 0) return 0;
    return x + somaRecursiva(x - 1);
};
console.log(somaRecursiva(10)); // Mostra 55



/**
 * Funções declaradas e invocadas imediatamente
 */
(function foo() {
    console.log("Hello Foo");
}());

(function food() {
    console.log("Hello Food");
})();