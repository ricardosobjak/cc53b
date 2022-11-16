'use strict';


function showHide(sourceElement) {
  const div = document.getElementById('resumo');

  if (div.classList.contains('hide')) {
    div.classList.remove('hide');
    sourceElement.innerHTML = "Hide";
  }
  else {
    div.classList.add('hide');
    sourceElement.innerHTML = "Show";
  }
}

/**
 * Definição de uma interface de Cidades
 */
class Cidade {
  constructor(uf, nome, populacao) {
    this.uf = uf;
    this.nome = nome;
    this.populacao = populacao;
  }
}

const cidades = [new Cidade('PR', 'Medianeira', 50000), new Cidade('PR', 'Missal', 15000), new Cidade('PR', 'Cascavel', 350000), new Cidade('SC', 'Chapecó', 250000), new Cidade('SC', 'Florianópolis', 510000), new Cidade('SC', 'Blumenau', 520000)];

function unique(arr, prop) {
  return arr
    .map(function (e) {
      return e[prop];
    })
    .filter(function (e, i, a) {
      return i === a.indexOf(e);
    });
}

function uniqueES6(arr, prop) {
  return arr.map((e) => e[prop]).filter((elemento, indice, array) => indice === array.indexOf(elemento));
}

/**
 * TUDO SEPARADO
 */
function returnUniqueProp(element) {
  let prop = this;
  return element[prop];
}
function returnEquals(element, index, originalArray) {
  return index === originalArray.indexOf(element);
}
function uniqueTudoSeparado(arr, prop) {
  let arraySomenteProp = arr.map(returnUniqueProp, prop);
  let arrayFiltrado = arraySomenteProp.filter(returnEquals);
  return arrayFiltrado;
}

function updateSelectUf() {
  let ufs = uniqueTudoSeparado(cidades, 'uf');

  let select = document.getElementById('uf');

  ufs.forEach((o) => {
    let option = document.createElement('option');
    option.innerHTML = o;
    option.id = o;
    select.appendChild(option);
  });

  changeUf(select.value);
}

function changeUf(uf) {
  const cidadeFilter = cidades.filter((cidade) => cidade.uf == uf);

  const select = document.getElementById('cidade');

  while (select.firstChild) select.removeChild(select.firstChild);

  cidadeFilter.forEach((cid) => {
    let option = document.createElement('option');
    option.innerHTML = cid.nome;
    option.id = cid.nome;
    select.appendChild(option);
  });
}

function updateResumo() {
  let total = cidades.map((e) => e.populacao).reduce((acc, e) => e + acc, 0);
  console.log(total);

  // população do estado
  let uf = document.getElementById('uf').value;
  const totalUf = cidades
    .filter((e) => e.uf == uf)
    .map((e) => e.populacao)
    .reduce((acc, e) => acc + e, 0);

  // população da cidade
  let cidade = document.getElementById('cidade').value;
  const totalCidade = cidades
    .filter((e) => e.nome == cidade)
    .map((e) => e.populacao)
    .reduce((acc, e) => acc + e, 0);

  document.getElementById('pop_total').innerHTML = 'População total: ' + total;
  document.getElementById('pop_uf').innerHTML = `População do estado (${uf}): ${totalUf}`;
  document.getElementById('pop_cidade').innerHTML = `População da cidade (${cidade}): ${totalCidade}`;
}

updateSelectUf();
updateResumo();
