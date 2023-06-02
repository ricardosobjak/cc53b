// URL da API que será consumida
const URL_API = 'https://jsonplaceholder.typicode.com/photos';

// Elemento para inserir as postagens
const posts = document.getElementById('posts');

fetch(URL_API)
    .then(function (response) {
        return response.text();
    })
    .then(function (arraybuffer) {
        const postsArray = JSON.parse(arraybuffer);

        postsArray.forEach(e => {
            const elem = document.createElement('div');

            const img = document.createElement('img');
            img.src = e.thumbnailUrl;

            const text = document.createElement('span');
            text.innerHTML = e.title;

            elem.appendChild(img);
            elem.appendChild(text);

            posts.appendChild(elem);
        })
    });