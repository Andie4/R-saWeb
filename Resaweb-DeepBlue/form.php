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
$message = "
      <html>
        <head>
            <title>Confirmation de réservation</title>
        </head>  

        <body>
          <p>Bonjour $nom_client $prenom_client, </p>
          <p>Les détails de votre réservation : 1</p> 
        <ul>
            <li>Activité : $id_excursion</li>
            <1i>Date : $date_reservation</1i>
            <1i>Horaire : $horaire</11>
            <1i>Horaire : $nombre_billets</11>
            
        </ul>
          <p>Merci et à bientôt dans l'eau !</p>
        </body>
      </html>";

//  Mail pour l'utilisateur qui a réservé
mail($mail_client, $sujet, $message);
}


?>
 <div class="loader">
        <div class="custom-form-container">
            <div class="custom-progress-container">
                <div class="custom-progress-bar" id="progress-bar"></div>
            </div>
            <div class="custom-slider">
                <div class="custom-photos">
                    <div class="custom-photo image active" id="form1-container">
                        <form method="post" action="form.php" enctype="multipart/form-data" id="form1">
                            <h2 class="custom-title">Deep Blue</h2>
                            <h3 class="custom-subtitle">Profil</h3>
                            <label for="nom">Nom :</label>
                            <input type="text" id="nom" name="nom_client" placeholder="Votre nom" required><br>
                            
                            <label for="prenom">Prénom :</label>
                            <input type="text" id="prenom" name="prenom_client" placeholder="Votre prénom" required><br> 
            
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="mail_client" placeholder="Votre email" required><br>
            
                            <div class="custom-btn-box">
                                <button type="button" onclick="showNextForm(2)">Suivant</button>
                            </div>
                        </form>
                    </div>
                    <div class="custom-photo image" id="form2-container">
                        <form method="post" action="form.php" enctype="multipart/form-data" id="form2">
                            <h2 class="custom-title">Deep Blue</h2>
                            <h3 class="custom-subtitle">Excursion</h3>
                            <label for="Excursion">Type d'excursion :</label>
                            <select id="Excursion" name="id_excursion">
                                <optgroup label="Types">
                                    <option value="">-----</option>
                                    <option value="1">Le champs de poissons</option>
                                    <option value="2">Les terreurs des mers</option>
                                    <option value="3">Le monde caché</option>
                                    <option value="4">Les oiseaux aquatiques</option>
                                    <option value="5">La danse des méduses</option>
                                    <option value="6">Exploration d'épaves</option>
                                </optgroup>
                            </select><br>
            
                            <label for="jour">Jour :</label>
                            <input type="date" id="jour" name="date_reservation" required><br>
            
                            <label for="Horaire">Horaire :</label>
                            <select id="Horaire" name="horaire">
                                <optgroup label="Horaires">
                                    <option value="">..h - ..h</option>
                                    <option value="8">8h -10h</option>
                                    <option value="10">10h -12h</option>
                                    <option value="13">13h -15h</option>
                                    <option value="15">15h -17h</option>
                                </optgroup>
                            </select><br>
            
                            <label for="nombre">Nombre de billets :</label>
                            <input type="number" id="nombre" name="nombre_billets" min="1" max="10" required><br>
            
                            <div class="custom-btn-box">
                                <button type="button" onclick="showPreviousForm(1)">Retour</button>
                                <button type="submit" name="valider">Valider</button>
                            </div>
                        </form>
                    </div>
                    <div class="custom-photo image" id="form3-container">
                        <form method="post" action="form.php" enctype="multipart/form-data" id="form3">
                            <h2 class="custom-title">Deep Blue</h2>
                            <p>Votre réservation a été envoyée par mail.</p><br>
                            <h3 class="custom-subtitle">Merci et à bientôt dans l’eau !</h3>
                            
                            <div class="custom-btn-box">
                               
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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