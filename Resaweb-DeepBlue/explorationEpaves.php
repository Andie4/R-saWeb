<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    <div>
        <h3>Les oiseaux aquatiques</h3>
        <p class="texteExcursions">Cette excursion vas vous permettre de voir les différents poissons présents près de
        la surface. Vous aurrez peut-être la chance de voir le balais des poissons . Plus de 300 poissons se déplaçant
        de façons coordonné.

        Ce balais rassemble plusieurs poissons ce qui fait plus de 40 couleurs a observer </p>
    </div>

    <section>
    <?php 
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "resawebdeepblue";

// $servername = "localhost";
// $username = "caneval";
// $password = "CV2rqsrtDxWHNy5";
// $dbname = "caneval_resaweb";

try {
    $conn = new PDO('mysql:host=localhost;dbname=resawebdeepblue', 'root', 'root', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    // $conn = new PDO('mysql:host=localhost;dbname=caneval_resaweb', 'caneval', 'CV2rqsrtDxWHNy5', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}

if(isset($_POST['valider'])) {
    $id_excursion = $_POST["id_excursion"];
    $date_reservation = $_POST["date_reservation"];
    $horaire = $_POST["horaire"];
    $nombre_billets = $_POST["nombre_billets"];
    $nom_client = $_POST["nom_client"];
    $prenom_client = $_POST["prenom_client"];
    $mail_client = $_POST["mail_client"];

    $sql = "INSERT INTO Reservation (excursion_id, date_reservation, horaire, nombre_billets, mail_client_fk) VALUES (:id_excursion, :date_reservation, :horaire, :nombre_billets, :mail_client_fk)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':id_excursion', $id_excursion);
    $stmt->bindParam(':date_reservation', $date_reservation);
    $stmt->bindParam(':horaire', $horaire);
    $stmt->bindParam(':nombre_billets', $nombre_billets);
    $stmt->bindParam(':mail_client_fk', $mail_client);

    $stmt->execute();
    
    $sql = "INSERT INTO Client (mail_client, nom_client, prenom_client) VALUES (:mail_client, :nom_client, :prenom_client)";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':mail_client', $mail_client);
    $stmt->bindParam(':nom_client', $nom_client);
    $stmt->bindParam(':prenom_client', $prenom_client);
   

    $stmt->execute();

    //  Configuration de l'e-mail pour l'utilisateur qui a réservé
$sujet = "Confirmation de réservation DeepBlue ";
$message = "Merci à vous, votre réservation a été confirmée. A bientôt dans l'eau ! ";

//  Mail pour l'utilisateur qui a réservé
mail($mail_client, $sujet, $message);
}


?>

        <div class="divForm">
          <img
            src="https://plus.unsplash.com/premium_photo-1710313643212-e30d7db5e108?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjF8fGZvbmQlMjBtYXJpbnxlbnwwfDF8MHx8fDA%3D"
            alt="" class="rectangle">
            <form method="post" action="explorationEpaves.php" enctype="multipart/form-data">
            <h4 class="titreForm">Réserver </h4>

<label for="nom">Nom</label>
    <input type="text" id="nom" name="nom_client" required placeholder="Votre nom"><br>
    
    <label for="prenom">Prenom</label>
    <input type="text" id="prenom" name="prenom_client" placeholder="Votre prenom"><br> 

    <label for="email">Email</label>
    <input type="email" id="email" name="mail_client" placeholder="Votre mail"><br>

    <label for="Excursion">Excursion</label>
    <select id="Excursion" name="id_excursion">
        <optgroup label="Types">
        <option value="">-----</option>
            <option value="1">Le champs de poissons</option>
            <option value="2">Les terreurs des mers</option>
            <option value="3" >Le monde caché</option>
            <option value="4" >Les oiseaux aquatiques</option>
            <option value="5" >La danse des méduses</option>
            <option value="6" >Exploration d'épaves</option>
        </optgroup>
    </select><br>

      <label for="jour">Jour</label>
    <input type="date" id="jour" name="date_reservation"><br>

    <label for="Horaire">Horaire</label>
    <select id="Horaire" name="horaire">
        <optgroup label="Horaires">
            <option value="">..h - ..h</option>
            <option value="8">8h -10h</option>
            <option value="10">10h -12h</option>
            <option value="13">13h -15h</option>
            <option value="15">15h -17h</option>

        </optgroup>
    </select><br>

    <label for="nombre">Nombre de billets</label>
    <input type="number" id="nombre" name="nombre_billets" min="1" max="10" required><br>
    

    <input type="submit" value="valider" name="valider">
</form>
        </div>
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