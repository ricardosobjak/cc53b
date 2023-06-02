/*
 * Objetos podem também ser criados usando-se o método Object.create(). 
 * Esse método pode ser muito útil, pois permite que você escolha 
 * o objeto protótipo para o objeto que você quer criar, 
 * sem a necessidade de se definir uma função construtora.
 */

// Encapsulamento das propriedades e métodos de Animal
var Animal = {
    tipo: "Invertebrados", // Propriedades de valores padrão
    qualTipo: function () {  // Método que ira mostrar o tipo de Animal
        console.log(this.tipo);
    }
}

// Cria um novo tipo de animal chamado animal1
var animal1 = Object.create(Animal);
animal1.qualTipo(); // Saída:Invertebrados

// Cria um novo tipo de animal chamado Peixes
var peixe = Object.create(Animal);
peixe.tipo = "Peixes";
peixe.qualTipo(); // Saída: Peixes


Animal.show = function () { console.log(this.tipo) };

peixe.show();
