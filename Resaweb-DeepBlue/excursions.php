<?php
// Connexion à la base de données
$conn = new PDO('mysql:host=localhost;dbname=resawebdeepblue', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//recherche
if(isset($_GET['s']) && !empty($_GET['s'])){
  $recherche = htmlspecialchars($_GET['s']); //vérification que 's' pour search n'est pas vide pour donner sa valeur à la recherche donc '$recherche'
  // Exécution de la requête
  $allexcursion = $conn->query("SELECT nom_excursion FROM Excursion WHERE nom_excursion LIKE '%$recherche%' ORDER BY nom_excursion DESC"); //affiche les noms des excursions correspondants à la rcherche. Le DESC range les résultats par odre décroissant.
} else {
  // Requête sans recherche
  $allexcursion = $conn->query('SELECT * FROM Excursion ORDER BY nom_excursion DESC'); // Si il n'y a pas de valeur de recherche alors toutes les excursions sont affichés d'où l'étoile qui veut dire affiche moi tout les éléments de la table Excursion.
}

$sql = 'SELECT * FROM Excursion ';

// trie 
if(isset($_GET["tri"])){
  $sql .= "ORDER BY " . $_GET["tri"];
  if(isset($_GET["order"]) && $_GET["order"] == "desc"){
      $sql .= " DESC";  // les excursions sont rangée paar ordre alphabétique du nom ou ordre croissant du prix qui leur correspond ( et aussi par ordre décroissant et alphabétique inversé)
  }
}

// filtre
if(isset($_GET['filtre']) && !empty($_GET['filtre'])){
  $filtre = htmlspecialchars($_GET['filtre']); //vérification que 'filtre' n'est pas vide
  // Utilisation du filtre dans la requête SQL
  $sql = "SELECT * FROM Excursion WHERE genre_excursion LIKE '%$filtre%'";  // les excursions sont rangée en fonction de leur genre
}


// Exécution de la requête
$allexcursion = $conn->query($sql);



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
  <link rel="icon" href="images/meduse.png">
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



    
<span>
      <p>Filtrer par genre : 
      <!-- Boutons de filtre -->
          <a href="excursions.php?filtre=bateau" class="trie-filtre">Bateau</a>
          <a href="excursions.php?filtre=Masque et tuba" class="trie-filtre">Masque et tuba</a>
          <a href="excursions.php?filtre=Plongée sous-marine" class="trie-filtre">Plongée sous marine</a>
          <a href="excursions.php" class="trie-filtre">Tout voir</a>
      </p>
</span>
    
    
      <a href="excursions.php?tri=nom_excursion" id="A-Z" class="trie-filtre">A-Z</a>
      <a href="excursions.php?tri=nom_excursion&order=desc" id="Z-A" class="trie-filtre">Z-A</a>
      <a href="excursions.php?tri=prix_excursion" id="croissant" class="trie-filtre">Croissant</a>
      <a href="excursions.php?tri=prix_excursion&order=desc" id="decroissant" class="trie-filtre">Décroissant</a>

  </div>
     


  <main class="catalogue" id="catalogue">
            <?php
            if ($allexcursion->rowCount() > 0) {
              while ($Excursion = $allexcursion->fetch()) {
                  if (isset($_GET['s']) && !empty($_GET['s']) && stripos($Excursion['nom_excursion'], $recherche) === false) {
                      continue; // Si la recherche est spécifiée mais si cette excursion ne correspond pas, passer à l'excursion suivante
                  }
                  $genreClass = strtolower(str_replace(' ', '-', $Excursion['genre_excursion']));
          ?>
                  <div class="articleCatalogue <?= $genreClass ?>">
                      <a href="<?= $Excursion['url_excursion']; ?>">
                          <img src="<?= $Excursion['chemin_image'] ?>" alt="" class="imgCatalogue">
                          <h3 class="sousTitreExcursions"><?= $Excursion['nom_excursion']; ?></h3>
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
