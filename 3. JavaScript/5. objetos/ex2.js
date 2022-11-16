/**
 * Uma função que instancia um objeto pessoa.
 * 
 * @param {String} name 
 * @returns Objeto pessoa
 */
function createPerson(name) {
  const obj = {};
  obj.name = name;
  obj.introduceSelf = function() {
    console.log(`Hi! I'm ${this.name}.`);
  }
  return obj;
}

/**
 * Construtor de Pessoa
 * 
 * @param {String} name 
 */
function Person(name) {
  this.name = name;
  this.introduceSelf = function() {
    console.log(`Hi! I'm ${this.name}.`);
  }
}


const juca = new Person('Juca');
juca.name;
juca.introduceSelf();

const frankie = new Person('Frankie');
frankie.name;
frankie.introduceSelf();
