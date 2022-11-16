// Estrutura de decisão IF...ELSE

let chuva = false;

if (chuva) {
  console.log('Filme');
} else {
  console.log('Praia');
}

// Swtich-case

let dia = 0;
switch (dia) {
  case 1:
    console.log('Domingo');
    break;
  case 2:
    console.log('seg');
    break;
  case 3: {
    console.log('ter');
    break;
  }
  case 4:
    console.log('qua');
    break;
  case 5:
    console.log('qui');
    break;
  case 6:
    console.log('sex');
    break;
  default:
    console.log('non ecxiste');
}

// If ternário
let oQueFazer = chuva ? 'Filme' : 'Praia';
console.log(oQueFazer);
