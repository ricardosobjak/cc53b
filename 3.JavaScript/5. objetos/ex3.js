'use strict';

/**
 * https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Guide/Working_with_Objects
 */

/**
 * Definição de uma classe Pessoa
 */
class Person {
  name; //Atributo explícito
  constructor(name) {
    this.name = name;
  }

  introduceSelf = () => {
    console.log(`Hi! I'm ${this.name}.`);
  }
}


const juca = new Person('Juca');
juca.introduceSelf();

const frankie = new Person('Frankie');
frankie.introduceSelf();



class Carro {
  constructor(marca, modelo) {
    this.marca = marca;
    this.modelo = modelo;
  }


  get cor() {
    return this.corDoCarro;
  }

  set cor(corDoCarro) {
    this.corDoCarro = corDoCarro;
  }


  print = () => {
    console.log(`${this.marca} ${this.modelo} ${this.cor}`);
  }
}

let uno = new Carro("Fiat", "Uno");
uno.cor = "Branco";
uno.print();
console.log(uno.cor)