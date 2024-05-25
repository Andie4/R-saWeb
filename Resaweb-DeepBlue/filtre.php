<?php
// Connexion à la base de données
$servername = "localhost";
$username = "caneval";
$password = "CV2rqsrtDxWHNy5";
$dbname = "caneval_resaweb";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}


// Trie des excursions
$db=new PDO('mysql:host=localhost;dbname=marchandbertin_resaweb;port=3306;charset=utf8', 'marchandbertin', 'm8YNF9F5SPcxhCv');
$requete='SELECT * FROM Charm';




if(isset ($_GET["tri"])){
$requete=$requete. " ORDER BY " .$_GET["tri"];
}




$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
foreach ($result as $Charm){
?>

<div class="produit">

<h2> <?= $Charm["nomCharm"] ?> </h2>

</div>

<?php
}
