// menu-burger

let menuToggle = document.querySelector('#chapter-toggle');
let menu = document.querySelector('.outgoing-list');
menuToggle.addEventListener('click', function (event) {
    event.preventDefault();
    menuToggle.classList.toggle('click');
    menu.classList.toggle('visible');
});
///////////////////////


// order
let orderToggle = document.querySelector('#order-button');
let orderToggle1 = document.querySelector('#order-button1');
let order = document.querySelector('.order');

orderToggle.addEventListener('click', function (event) {
    event.preventDefault();
    order.classList.toggle('visible');
});

orderToggle1.addEventListener('click', function (event) {
    event.preventDefault();
    order.classList.toggle('visible');
});
///////////////////////

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form');
    form.addEventListener('submit', formSend);

    async function formSend(e) {
        e.preventDefault();
        
        let formData = new FormData(form);
        
        alert("Идет отправка данных");
        let response = await fetch('../../sendmail.php', {
            method: 'POST',
            body: formData
        });
        if (response.ok) {
            let result = await response.json();
            alert(result.message);
            formPreview.innerHTML = '';
            form.reset();
        } else {
            alert("Ошибка");
        }
        
    }
});