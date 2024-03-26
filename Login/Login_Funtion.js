function changeForm(e) {
    switchCtn.classList.add('is-gx');
    setTimeout(function () {
        switchCtn.classList.remove('is-gx');
    }, 1500);

    switchCtn.classList.toggle('is-txr');

    switchC1.classList.toggle('is-hidden');
    switchC2.classList.toggle('is-hidden');
    acontenedor.classList.toggle('is-txl');
    bcontenedor.classList.toggle('is-txl');
    bcontenedor.classList.toggle('is-z200');
}
let switchCtn = document.querySelector('#switch-cnt');
let switchC1 = document.querySelector('#switch-c1');
let switchC2 = document.querySelector('#switch-c2');
let switchBtn = document.querySelectorAll('.switch-btn');
let acontenedor = document.querySelector('#a-contenedor');
let bcontenedor = document.querySelector('#b-contenedor');
let allButtons = document.querySelectorAll('.submit');
let getButtons = (e) => e.preventDefault();

let mainF = (e) => {
    for (var i = 0; i < allButtons.length; i++) allButtons[i].addEventListener('click', getButtons);
    for (var i = 0; i < switchBtn.length; i++) switchBtn[i].addEventListener('click', changeForm);
};

window.addEventListener('load', mainF);


