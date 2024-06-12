<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deep Blue</title>
    <link rel="stylesheet" href="style.css">    
    <link rel="icon" href="images/meduse.png">
</head>
<body>
    <div class="container espacePageAcceuil"></div>

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

    <section>
    <?php
    // Connexion à la base de données
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "resawebdeepblue";

    try {
        $conn = new PDO('mysql:host=localhost;dbname=caneval_resaweb', 'caneval', 'CV2rqsrtDxWHNy5', array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "La connexion a échoué : " . $e->getMessage();
    }

    // Variable pour stocker le message de confirmation
    $confirmationMessage = "";

    // Fonction pour obtenir le nom de l'activité
    function getNomActivite($conn, $id_excursion) {
        $sql = "SELECT nom_excursion FROM Excursion WHERE id_excursion = :id_excursion";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':id_excursion', $id_excursion);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['nom_excursion'];
    }

    // Fonction pour obtenir l'horaire formaté
    function getHoraire($horaire) {
        $horaires = [
            8 => "8h - 10h",
            10 => "10h - 12h",
            13 => "13h - 15h",
            15 => "15h - 17h"
        ];
        return $horaires[$horaire];
    }

    // Fonction pour envoyer l'email de confirmation à l'administrateur
    function envoyerEmailConfirmationAdmin($nom_client, $prenom_client, $nom_excursion, $date_reservation, $horaire_formate, $nombre_billets) {
        $sujetAdmin = "🚨 Nouvelle réservation DeepBlue🚨 ";
        $messageAdmin = "
        Une nouvelle réservation a été effectuée.

        Détails de la réservation :

        Nom : $nom_client $prenom_client
        Activité : $nom_excursion
        Date : $date_reservation
        Horaire : $horaire_formate
        Nombre de billets : $nombre_billets
        ";
        $mailAdmin = "andreacaneval6@gmail.com"; 
        mail($mailAdmin, $sujetAdmin, $messageAdmin);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['valider'])) {
        $id_excursion = $_POST["id_excursion"];
        $date_reservation = $_POST["date_reservation"];
        $horaire = $_POST["horaire"];
        $nombre_billets = $_POST["nombre_billets"];
        $nom_client = $_POST["nom_client"];
        $prenom_client = $_POST["prenom_client"];
        $mail_client = $_POST["mail_client"];

        // Vérification de l'e-mail
        $sqlCheckEmail = "SELECT COUNT(*) AS count FROM Client WHERE mail_client = :mail_client";
        $stmtCheckEmail = $conn->prepare($sqlCheckEmail);
        $stmtCheckEmail->bindParam(':mail_client', $mail_client);
        $stmtCheckEmail->execute();
        $emailCount = $stmtCheckEmail->fetch(PDO::FETCH_ASSOC)['count'];

        try {
            $conn->beginTransaction();

            // Insérer le client si l'e-mail n'existe pas déjà
            if ($emailCount == 0) {
                $sqlClient = "INSERT INTO Client (mail_client, nom_client, prenom_client) VALUES (:mail_client, :nom_client, :prenom_client)";
                $stmtClient = $conn->prepare($sqlClient);
                $stmtClient->bindParam(':mail_client', $mail_client);
                $stmtClient->bindParam(':nom_client', $nom_client);
                $stmtClient->bindParam(':prenom_client', $prenom_client);
                if (!$stmtClient->execute()) {
                    throw new Exception("Erreur lors de l'insertion du client: " . implode(", ", $stmtClient->errorInfo()));
                }
            }

            // Insérer la réservation
            $sqlReservation = "INSERT INTO Reservation (excursion_id, date_reservation, horaire, nombre_billets, mail_client_fk) VALUES (:id_excursion, :date_reservation, :horaire, :nombre_billets, :mail_client_fk)";
            $stmtReservation = $conn->prepare($sqlReservation);
            $stmtReservation->bindParam(':id_excursion', $id_excursion);
            $stmtReservation->bindParam(':date_reservation', $date_reservation);
            $stmtReservation->bindParam(':horaire', $horaire);
            $stmtReservation->bindParam(':nombre_billets', $nombre_billets);
            $stmtReservation->bindParam(':mail_client_fk', $mail_client);
            if (!$stmtReservation->execute()) {
                throw new Exception("Erreur lors de l'insertion de la réservation: " . implode(", ", $stmtReservation->errorInfo()));
            }

            $conn->commit();

            // Récupérer le nom de l'activité et l'horaire formaté
            $nom_excursion = getNomActivite($conn, $id_excursion);
            $horaire_formate = getHoraire($horaire);

            // Envoyer l'e-mail de confirmation au client
            $sujetClient = "Confirmation de réservation DeepBlue";
            $messageClient = "
            Bonjour $nom_client $prenom_client,
            Les détails de votre réservation :
            
                    Activité : $nom_excursion
                    Date : $date_reservation
                    Horaire : $horaire_formate
                    Nombre de billet : $nombre_billets
                
            
            Merci et à bientôt dans l'eau !🐙
            ";
            if (!mail($mail_client, $sujetClient, $messageClient)) {
                throw new Exception("Erreur lors de l'envoi de l'email de confirmation au client");
            }

            // Envoyer l'e-mail de confirmation à l'administrateur
            envoyerEmailConfirmationAdmin($nom_client, $prenom_client, $nom_excursion, $date_reservation, $horaire_formate, $nombre_billets);

            $confirmationMessage = "✅ Votre réservation a été enregistrée avec succès. ✅";

        } catch (Exception $e) {
            $conn->rollBack();
            $confirmationMessage = "❌ Une erreur est survenue lors de votre réservation. Veuillez réessayer. Détails de l'erreur: " . $e->getMessage() . " ❌";
        }
    }
    ?>
        <div class="message">
            <?php if (!empty($confirmationMessage)) : ?>
                <p class="confirmation-message"><?php echo $confirmationMessage; ?></p>
            <?php endif; ?>
        </div>

        <div class="loader">
            <div class="custom-form-container">
                <form method="post" action="form.php" enctype="multipart/form-data" id="form1">
    <h2 class="custom-title">Deep Blue</h2>
    <p class="obligatoire">* Champs obligatoires</p>
    <h3 class="custom-subtitle">Profil</h3>
    <label for="nom">Nom :</label>
    <input type="text" id="nom_client" name="nom_client" placeholder="Votre nom * (max 255 caractères)" required><br>
    <label for="prenom">Prénom :</label>
    <input type="text" id="prenom_client" name="prenom_client" placeholder="Votre prénom * (max 255 caractères)" required><br> 
    <label for="email">Email :</label>
    <input type="email" id="mail_client" name="mail_client" placeholder="Votre email * (max 255 caractères)" required><br>

    <h3 class="custom-subtitle">Excursion</h3>
    <label for="Excursion">Type d'excursion :</label>
    <select id="id_excursion" name="id_excursion" required>
        <optgroup label="Types">
            <option value="">----- *</option>
            <option value="1">Le champs de poissons</option>
            <option value="2">Les terreurs des mers</option>
            <option value="3">Le monde caché</option>
            <option value="4">Les oiseaux aquatiques</option>
            <option value="5">La danse des méduses</option>
            <option value="6">Exploration d'épaves</option>
        </optgroup>
    </select><br>
    <label for="jour">Jour :</label>
    <input type="date" id="date_reservation" name="date_reservation" min="<?= date('Y-m-d')?>"><br>
    <label for="Horaire">Horaire :</label>
    <select id="horaire" name="horaire" required>
        <optgroup label="Horaires">
            <option value="">..h - ..h *</option>
            <option value="8">8h -10h</option>
            <option value="10">10h -12h</option>
            <option value="13">13h -15h</option>
            <option value="15">15h -17h</option>
        </optgroup>
    </select><br>
    <label for="nombre">Nombre de billets :</label>
    <input type="number" id="nombre_billets" name="nombre_billets" min="1" max="10" required><br>
    <div class="custom-btn-box">
        <button type="submit" name="valider">Valider</button>
    </div>
</form>

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
            <li class="menu__item"><a class="menu__link" href="index.php">Accueil</a></li>
            <li class="menu__item"><a class="menu__link" href="notreHistoire.php">Notre histoire</a></li>
            <li class="menu__item"><a class="menu__link" href="excursions.php">Excursions</a></li>
            <li class="menu__item"><a class="menu__link" href="vieMarine.php">Vie marine</a></li>
            <li class="menu__item"><a class="menu__link" href="aPropos.php">A propos</a></li>
        </ul>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="resaweb.js"></script>
</body>
</html>
