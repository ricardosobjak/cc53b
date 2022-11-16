/**
 * Escopo de variáveis: GLOBAL e LOCAL
 */

var x = 0; // Definição de variável global.

function a() {
  var y = 2; // Escopo de variável local (escopo da função a)

  console.log(x, y); // 0 2

  function b() {
    x = 3; // Atribui o valor à variável global x existente
    y = 4; // Atribui o valor à variável local y existente
    z = 5; // Cria a variável global z (implícitamente)
           // (Throws a ReferenceError in strict mode.)
  }

  b(); // Cria a variável z como global
  console.log(x, y, z); // 3 4 5
}

a();

console.log(x, z);     // 3 5
console.log(typeof y); // "undefined"