// page notre histoire
var position = 1;
const dots = document.querySelectorAll('.dots');
const jsPhotos = document.querySelector('.js-photos');

// Initialisation des points (dots)
function retourDebut() {
    position = 0;
    jsPhotos.style.transition = 'none';
    jsPhotos.style.left = position * -500 + 'px';
    setTimeout(function () {
        jsPhotos.style.transition = 'left 0.3s ease';
        DecaleGauche();
    }, 20);
}

function retourFin() {
    position = 3;
    jsPhotos.style.transition = 'none';
    jsPhotos.style.left = position * -500 + 'px';
    setTimeout(function () {
        jsPhotos.style.transition = 'left 0.3s ease';
        DecaleDroite();
    }, 20);
}

function DecaleGauche() {
    position = position + 1;
    if (position == 4) {
        retourDebut();
    } else {
        jsPhotos.style.left = position * -500 + 'px';
        
    }

}

function DecaleDroite() {
    position = position - 1;
    if (position == 0) {
        retourFin();
    } else {
        document.querySelector(".js-photos").style.left = position * -500 + 'px';
        
    }

}


// Effet parallax au scroll
document.addEventListener('DOMContentLoaded', () => {
    document.addEventListener('scroll', function() {
        const scrollPosition = window.scrollY;
        console.log("Scroll position: ", scrollPosition);

        const parallaxElements = document.querySelectorAll('.parallax1, .parallax2, .parallax3, .parallax4');
        console.log("Parallax elements: ", parallaxElements);

        parallaxElements.forEach(element => {
            if (element) {  // Check if the element exists
                const speed = element.getAttribute('data-speed');
                const factor = 25;  // Adjust this factor to make the movement more pronounced
                const move = (scrollPosition * speed / 100) * factor;
                
                console.log(`Element: ${element.className}, Speed: ${speed}, xPos: ${move}, yPos: ${move}`);
                
                element.style.transform = `translate(${move -0}%, 0)`;
            } else {
                console.warn('Parallax element not found:', element);
            }
        });
    });
});




