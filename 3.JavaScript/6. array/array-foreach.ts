let fruits = ['Banana', 'Maçã', 'Abacate'];

for (let i = 0; i < fruits.length; i++)
  console.log(`${i}=${fruits[i]}`);

for (const fruit of fruits)
  console.log(fruit);

fruits.forEach((e, i, a) => 
  console.log(`${i}=${e} (${a})`));
