Liens : 
L’url du site : https://resaweb.caneval.butmmi.o2switch.site/index.php
Lien vers le tableur Opquast et A11y : https://docs.google.com/spreadsheets/d/1ZstReyQ0krD17JDHL5Uyb-ize6VYQTXxl76WKF_sBcQ/edit?usp=sharing 



Description complète de la procédure à faire pour réinstaller le site et la base de données sur un serveur local MAMP: 
- Tout d’abord il faut télécharger la base de données et le site sur son ordinateur. 
- Ensuite il faut déplacer le dossier du site téléchargé dans MAMP/ hotdocs (sur MAC) 
- Lancer le MAMP
- aller sur http://localhost:8888/  pour accéder au dossier « resaweb »
- ouvrir le php my admin local (http://localhost:8888/phpMyAdmin5/index.php sur MAC) 
- appuyé sur « nouvelles base de données », lui donnée un nom et faire importer une base de données. 
- Choisir la base de données téléchargé
- ouvrir le code avec VS Code 
- changer les informations de cette ligne pour les remplacer par : $conn = new PDO('mysql:host=localhost;dbname=resaweb', ‘root’, ‘root’, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));

(L’id et mot de passe sur MAC sont « root » et « root »)

- recharger la page 







, on précisera l’url locale à
utiliser pour y accéder.