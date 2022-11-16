const obj = {}; // Objeto vazio
console.log(obj);

const person = {
  name: ['Bob', 'Smith'],
  age: 32,
  bio: function () {
    console.log(`${this.name[0]} ${this.name[1]} is ${this.age} years old.`);
  },
  introduceSelf: function () {
    console.log(`Hi! I'm ${this.name[0]}.`);
  },
};

console.log(person.name);
console.log(person);
person.bio();
person.introduceSelf();

const person2 = {
  name: ['Bob', 'Smith'],
  age: 32,
  bio() {
    console.log(`${this.name[0]} ${this.name[1]} is ${this.age} years old.`);
  },
  introduceSelf() {
    console.log(`Hi! I'm ${this.name[0]}.`);
  },
};

person2.bio();
person2.introduceSelf();

const person3 = {
  name: {
    first: 'Bob',
    last: 'Smith',
  },
  age: 32,
  bio() {
    console.log(`${this.name.first} ${this.name.last} is ${this.age} years old.`);
  },
  introduceSelf() {
    console.log(`Hi! I'm ${this['name']['first']}.`);
  },

  get fullName() {
    return this.name.first + " " + this.name.last;
  }
};

person3.bio();
person3.introduceSelf();

const myDataName = 'age';
const myDataValue = '40';
person3[myDataName] = myDataValue;
person3.bio();
console.log(person3.fullName);
