// page notre histoire
// Slider and other functionalities remain the same
var position = 1;

function DecaleGauche() {
    position += 1;
    if (position == 4) {
        retourDebut();
    } else {
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        ColorDots();
    }
}

function retourDebut() {
    position = 0;
    document.querySelector(".js-photos").style.transition = 'none';
    document.querySelector(".js-photos").style.left = position * -500 + 'px';
    setTimeout(() => {
        document.querySelector(".js-photos").style.transition = 'left 0.3s ease';
        DecaleGauche();
    }, 20);
}

function DecaleDroite() {
    position -= 1;
    if (position == 0) {
        retourFin();
    } else {
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        ColorDots();
    }
}

function retourFin() {
    position = 4;
    document.querySelector(".js-photos").style.transition = 'none';
    document.querySelector(".js-photos").style.left = position * -500 + 'px';
    setTimeout(() => {
        document.querySelector(".js-photos").style.transition = 'left 0.3s ease';
        DecaleDroite();
    }, 20);
}

var dots = document.querySelectorAll('.dots');
function ColorDots() {
    dots.forEach(element => element.style.backgroundColor = '#000000');
    dots[position - 1].style.backgroundColor = '#ffffff';
}

dots.forEach((element, index) => {
    element.addEventListener('click', () => {
        position = index + 1;
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        ColorDots();
    });
});

  



// Effet parallax au scroll
window.addEventListener('scroll', function () {
    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    let parallaxElements = document.querySelectorAll('.parallax1, .parallax2, .parallax3, .parallax4');

    parallaxElements.forEach(function (element) {
        let speed = element.getAttribute('data-speed');
        let xPos = scrollTop * speed / 10;
        if (element.classList.contains('parallax1') || element.classList.contains('parallax3')) {
            element.style.transform = `translateX(${xPos}px) translateY(${xPos / 2}px)`;
        } else {
            element.style.transform = `translateX(-${xPos}px) translateY(${-xPos / 2}px)`;
        }
    });

    let title = document.querySelector('.titreBanniere');
    let titleSpeed = 0.5;
    let titleYPos = scrollTop * titleSpeed;
    title.style.transform = `translateY(${titleYPos}px)`;
});
