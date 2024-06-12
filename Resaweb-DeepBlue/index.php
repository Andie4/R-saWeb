<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excursions sous marine</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,551;1,551&display=swap" rel="stylesheet">
    <link rel="icon" href="images/pe-meduse.png">    
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body>

    <div class="container espacePageAcceuil">

    <header>
            <nav>
                <a href="index.php" class="logo-link"><img src="images/pe-meduse.png" alt="" class="logo"></a>
                <ul class="navbar">
                    <li><a href="notreHistoire.php">Notre histoire</a></li>
                    <li><a href="excursions.php">Excursions</a></li>
                    <li><a href="vieMarine.php">Vie marine</a></li>
                    <li><a href="aPropos.php">A propos</a></li>
                </ul>
            </nav>
        </header>
        

         
         <!-- Banière -->
         <div class="banniere">
    <img src="images/fond-ocean.jpg" alt="" class="parallax">
    <img src="images/pink-fish.png" alt="" class="parallax1" data-speed="3">
<img src="images/blue-fish.png" alt="" class="parallax2" data-speed="5">
<img src="images/turtle.png" alt="" class="parallax3" data-speed="7">
<img src="images/fish.png" alt="" class="parallax4" data-speed="9">
    <h1 class="titreBanniere" data-aos="fade-up">
        <div><span>EXCURSIONS</span></div>
        <div><span>SOUS MARINE</span></div>
    </h1>
</div>


        <!-- page d'accueil -->
        <div class="homePage" id="enSavoirPlus">
            <div data-aos="fade-left">
                <div class="partie1">
                    <h2 class="contourBleu sousTitre1"><span>Pourquoi choisir</span><br> <span>DEEP BLUE</span></h2>
                    <h3 class="sousTitre2">Explorez les trésors cachés de l'océan <h3>
                    
                </div>
            </div>
           
        </div>
        
    </div>
     <div class="presentation">
        <p> 
            Chez Deep Blue, nous vous invitons à découvrir les merveilles du monde sous-marin à travers nos excursions inoubliables. Que vous soyez un plongeur expérimenté ou un débutant curieux, nos sorties sont conçues pour vous offrir une expérience unique et sécurisée. <br>

            <br>Explorez les récifs coralliens colorés, nagez aux côtés de majestueuses raies mantas et découvrez la vie marine foisonnante de nos eaux cristallines. Nos guides experts vous accompagneront à chaque étape, partageant leurs connaissances et veillant à ce que vous profitiez pleinement de chaque plongée. <br>

            <br>Rejoignez-nous pour une aventure qui éveille les sens et nourrit l'âme. Inscrivez-vous dès maintenant et embarquez pour une exploration sous-marine extraordinaire avec Deep Blue. <br>
            
            <br>La mer vous attend. Plongez avec nous !
        </p>

            </div>

    <section class="">
        <div data-aos="fade-down">
            <main class="apercuCatalogue">
                <section class="apercuArticleCatalogue un">
                    <img src="images/pe-poissons.jpg"
                        alt="" class="imgApercu">
                    <h3 class="sousTitreApercu">Le champs des poissons</h3><br>
                </section>
                <section class="apercuArticleCatalogue deux">
                    <img src="images/pe-requin.jpg"
                        alt="" class="imgApercu">
                    <h3 class="sousTitreApercu">Les terreurs des mers</h3><br>
                </section>
                <section class="apercuArticleCatalogue trois">
                    <img src="images/pe-grotte.jpg"
                        alt="" class="imgApercu">
                    <h3 class="sousTitreApercu">Le monde caché</h3><br>
                </section>
            </main>
        </div>
        <main class="container-lien">
            <a href="excursions.php" class="lienReserver">En savoir plus</a>
        </main>
    </section>

    <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
   

    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="index.php">Accueil</a></li>
      <li class="menu__item"><a class="menu__link" href="notreHistoire.php">Notre histoire</a></li>
      <li class="menu__item"><a class="menu__link" href="excursions.php">Excursions</a></li>
      <li class="menu__item"><a class="menu__link" href="vieMarine.php">Vie marine</a></li>
      <li class="menu__item"><a class="menu__link" href="aPropos.php">A propos</a></li>
    </ul>

  </footer>

    <script src="resaweb.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- Pour initialiser le plugin AOS -->
    <script>
        AOS.init();
    </script>
    
</body>

</html>
