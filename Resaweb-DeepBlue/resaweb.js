// Page load event for loader animation
window.addEventListener('load', () => {
    document.querySelector('.loader').classList.add('fondu-out');
});

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

// Pour masquer et afficher les pages du formulaires
document.addEventListener("DOMContentLoaded", function () {
    const progressBar = document.getElementById('progress-bar');
    const totalSteps = 3;

    function updateProgressBar(step) {
        const progressPercentage = (step / totalSteps) * 100;
        progressBar.style.width = progressPercentage + '%';
    }

    function showNextForm(nextFormId) {
        document.querySelector('.custom-photo.active').classList.remove('active');
        document.getElementById('form' + nextFormId + '-container').classList.add('active');
        updateProgressBar(nextFormId);
    }

    function showPreviousForm(previousFormId) {
        document.querySelector('.custom-photo.active').classList.remove('active');
        document.getElementById('form' + previousFormId + '-container').classList.add('active');
        updateProgressBar(previousFormId);
    }

    window.showNextForm = showNextForm;
    window.showPreviousForm = showPreviousForm;

    // Barre de progression
    updateProgressBar(1);
});
