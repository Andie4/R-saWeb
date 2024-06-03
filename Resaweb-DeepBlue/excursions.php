<?php
// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=resawebdeepblue', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// fait avec : https://youtu.be/6u5D_EfKw40?si=C2q9g_qOWkdK04WI
$allexcursion= $conn->query('SELECT * FROM Excursion ORDER BY nom_excursion DESC');
// if(isset($_GET['s']) AND !empty($_GET['s'])){
//   $recherche = htmlspecialchars($_GET['s']);
//   $allexcursion = $conn->query('SELECT nom_excursion FROM Excursion WHERE nom_excursion LIKE "%'. $recherche.'%" ORDER BY nom_excursion DESC');
// echo $allexcursion ;
// }

if(isset($_GET['s']) && !empty($_GET['s'])){
  $recherche = htmlspecialchars($_GET['s']);
  // Affichage de la requête pour vérification
  // echo "Requête SQL : SELECT nom_excursion FROM Excursion WHERE nom_excursion LIKE '%$recherche%' ORDER BY nom_excursion DESC";
  // Exécution de la requête
  $allexcursion = $conn->query("SELECT nom_excursion FROM Excursion WHERE nom_excursion LIKE '%$recherche%' ORDER BY nom_excursion DESC");
} else {
  // Requête sans recherche
  $allexcursion = $conn->query('SELECT * FROM Excursion ORDER BY nom_excursion DESC');
}


?>


<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deep Blue</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,551;1,551&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>

<body>

  <div class="container espacePageAcceuil"></div>

  <header>

    <nav>
      <a href="resaweb.php" class="logo">ESM</a>
      <ul class="navbar">
        <li><a href="notreHistoire.php">Notre histoire</a></li>
        <li><a href="excursions.php">Excursions</a></li>
        <li><a href="vieMarine.php">Vie marine</a></li>
        <li><a href="aPropos.php">A propos</a></li>
      </ul>
    </nav>
  </header>

  </div>

  <section class="excursions .espaceExcursions">

    <h1 class="titrePages ">Excursions</h1>







 <!-- Barre de recherche -->
 <form method="GET">
      <input type="search" name="s" placeholder="Rechercher..." autocomplete="off">
    </form>




<button id="search-bateau">Bateau</button>
      <button id="search-masque">Masque et tuba</button>
      <button id="search-plongee">Plongée sous marine</button>
      <button id="clear-filter">Tout afficher</button>
      <button id="az">A-Z></button>
      <button id="za">Z-A</button>
      <button id="croissant">↑</button>
      <button id="decroissant">↓</button>
  <div class="produit">

  </div>
     


    <main class="catalogue" id="catalogue">

    <?php
    $allexcursion->execute(); // Réexécutez la requête pour réinitialiser le curseur
    if($allexcursion->rowCount() > 0){
        while($Excursion = $allexcursion->fetch()){
            if(isset($_GET['s']) && !empty($_GET['s']) && stripos($Excursion['nom_excursion'], $recherche) === false){
                continue; // Si la recherche est spécifiée mais cette excursion ne correspond pas, passer à l'excursion suivante
            }
            ?>
            <div class="articleCatalogue">
                <a href="#">
                    <img src="https://example.com/image.png" alt="" class="imgCatalogue">
                    <h3 class="sousTitreExcursions"><?php echo $Excursion['nom_excursion']; ?></h3>
                </a>
            </div>
            <?php
        }
    } else {
        ?>
        <p>Aucune excursion trouvée</p>
        <?php
    }
    ?>

  
    
    </main>
   
    <section class="FAQ">
      <div class="step2">
          <details>
                  <summary>1. Quelles sont les précautions de sécurité essentielles avant une plongée sous-marine ?</summary>
                  <p>Avant de plonger, il est crucial de s'assurer que votre équipement est en bon état, de vérifier les conditions météorologiques et de la mer, ainsi que de planifier votre plongée en fonction de votre niveau de compétence et des caractéristiques du site.</p>
          </details>

          <details>
                  <summary>2. Quel équipement de sécurité devrais-je avoir lors d'une plongée sous-marine ?</summary>
                  <p>L'équipement de sécurité comprend un gilet stabilisateur, un détendeur de secours, une lampe de plongée, une balise de signalisation, un sifflet, un couteau de plongée et une trousse de premiers secours. Une combinaison de plongée adéquate est également importante pour maintenir la chaleur corporelle.</p>
          </details>

          <details>
                  <summary>3. Comment puis-je éviter les accidents de plongée ?</summary>
                  <p>Pour éviter les accidents, suivez toujours les règles de sécurité, plongez avec un partenaire et respectez les limites de votre certification de plongée. Évitez de plonger en cas de fatigue, de maladie ou de consommation d'alcool ou de drogues.</p>
          </details>

          <details>
              <summary>4. Quelles sont les règles de sécurité pendant la plongée ?</summary>
              <p>Tenez-vous au courant de votre consommation d'air et de votre temps de plongée, respectez les limites de profondeur recommandées et surveillez votre profondeur. Communiquez régulièrement avec votre binôme et signalez tout problème ou inconfort. </p>
          </details>

          <details>
              <summary>5. Que faire en cas d'urgence sous-marine ?</summary>
              <p>En cas d'urgence, restez calme, signalez le problème à votre binôme et suivez les procédures d'urgence enseignées lors de votre formation en plongée. Cela peut inclure la remontée contrôlée vers la surface, le partage de gaz avec votre binôme ou l'utilisation de la trousse de premiers secours pour les blessures mineures.</p>
          </details>

          <details>
              <summary>6. Comment puis-je me préparer à une plongée sécurisée ?</summary>
              <p>Assurez-vous d'avoir une bonne condition physique, de suivre une formation en plongée certifiée, et de pratiquer régulièrement vos compétences en plongée. Planifiez soigneusement chaque plongée, en tenant compte des conditions météorologiques et des caractéristiques du site.</p>
          </details>

          <details>
              <summary>7. Dois-je souscrire une assurance plongée ?</summary>
              <p>Il est fortement recommandé de souscrire une assurance plongée qui couvre les frais médicaux d'urgence, l'évacuation médicale, et les accidents de plongée. Cela peut vous protéger financièrement en cas d'incident sous-marin.</p>
          </details>

          <details>
              <summary>8. Quelles sont les précautions à prendre après une plongée ?</summary>
              <p>Après une plongée, observez un intervalle de surface approprié pour éviter la maladie de décompression, hydratez-vous bien, et surveillez les signes de fatigue ou de symptômes de maladie de décompression. En outre, assurez-vous de nettoyer et de ranger votre équipement de plongée correctement pour qu'il soit prêt pour la prochaine plongée.</p>
          </details>
          
      </div>
      



</section>
      
  </section>

    


  </section>


  <footer class="footer">
    <div class="waves">
      <div class="wave" id="wave1"></div>
      <div class="wave" id="wave2"></div>
      <div class="wave" id="wave3"></div>
      <div class="wave" id="wave4"></div>
    </div>
   

    <ul class="menu">
      <li class="menu__item"><a class="menu__link" href="resaweb.php">Accueil</a></li>
      <li class="menu__item"><a class="menu__link" href="notreHistoire.php">Notre histoire</a></li>
      <li class="menu__item"><a class="menu__link" href="excursions.php">Excursions</a></li>
      <li class="menu__item"><a class="menu__link" href="vieMarine.php">Vie marine</a></li>
      <li class="menu__item"><a class="menu__link" href="aPropos.php">A propos</a></li>
      <li class="menu__item"><a class="menu__link" href="#">Recherche</a></li>
    </ul>

  </footer>




  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <script src="resaweb.js"></script>

</body>

</html>
