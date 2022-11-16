'use strict';

/**
 * https://developer.mozilla.org/pt-BR/docs/Web/JavaScript/Guide/Working_with_Objects
 */


class Automovel {
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

class Carro extends Automovel {
  constructor(marca, modelo, portas) {
    super(marca, modelo);
    this.portas = portas;
  }
}

let uno = new Carro("Fiat", "Uno", 4);
uno.cor = "Branco";
uno.print();
console.log(uno)
