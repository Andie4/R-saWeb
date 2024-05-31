<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "resawebdeepblue";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "La connexion a échoué : " . $e->getMessage();
}


// Trie des excursions
$requete='SELECT * FROM Excurion';


if(isset ($_GET["tri"])){
$requete=$requete. " ORDER BY " .$_GET["tri"];
}


$stmt=$db->query($requete);
$result=$stmt->fetchall(PDO::FETCH_ASSOC);
foreach ($result as $prix){
?>

<div class="produit">

<h2> <?= $prix["prix"] ?> </h2>

</div>

<?php
}
