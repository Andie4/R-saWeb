<!DOCTYPE html>
<html lang="en">
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
        <h3>Les terreurs des mers </h3>
        <p class="texteExcursions">Cette excursion vas vous permettre de voir les différents poissons présents près de
        la surface. Vous aurrez peut-être la chance de voir le balais des poissons . Plus de 300 poissons se déplaçantde façons coordonné. <br>
        Ce balais rassemble plusieurs poissons ce qui fait plus de 40 couleurs a observer</p>
    </div>
    <section>
        <div class="divForm">
          <img
            src="https://plus.unsplash.com/premium_photo-1710313643212-e30d7db5e108?w=800&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjF8fGZvbmQlMjBtYXJpbnxlbnwwfDF8MHx8fDA%3D"
            alt="" class="rectangle">
            <form method="post" action="excursions.php" enctype="multipart/form-data">

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
    
        <p>&copy;2021 Nadine Coelho | All Rights Reserved</p>
      </footer>
    
      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script src="resaweb.js"></script>
</body>
</html>