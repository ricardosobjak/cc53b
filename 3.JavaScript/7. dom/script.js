// Alterando um elemento existente
document.querySelector("#name").innerHTML = "Meu nome é Juca";


// Criando um botão 
const input = document.createElement("input");
input.type = "button";
input.value = "Botão";
document.body.appendChild(input);
input.onclick = () => {
    alert('Oi');
}



// Criando uma DIV
const div1 = document.createElement("div");
div1.className = "block";
div1.innerHTML = "Minha DIV"
document.body.appendChild(div1);


// Criando uma Lista
const ul = document.createElement("ul");
const li1 = document.createElement("li");
const li2 = document.createElement("li");

li1.innerHTML = "Item 1";
li2.innerHTML = "Item 2";

ul.appendChild(li1);
ul.appendChild(li2);
document.body.appendChild(ul);


// Removendo um elemento
document.querySelector("#remove").remove();


// Outras formas de obter elementos do HTML
console.log(document.getElementById('name').innerHTML) 
console.log(document.getElementsByTagName('input').length)