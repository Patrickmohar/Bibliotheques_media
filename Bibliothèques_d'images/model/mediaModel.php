<?php

/**
 * stockMedia : permet de stocker une img en base de données
 * 
 * @param PDO $bdd objet PDO
 * @param string $nom_fichier
 * @param string $description
 * @param string $url
 * @param string $url_cible
 * @param string $alt
 * @param string $credits 
 * 
 * @return int $lines nombre de lignes affectés
 */
if (isset($_FILES['img'], $_POST['description'], $_POST['url_cible'], $_POST['alt'], $_POST['credits'])) {





    try {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        ];
        $bdd = new PDO('mysql:host=localhost;dbname=cci_openlab', 'root', '', $options);
    } catch (Exception $e) {

        die('Erreur : ' . $e->getMessage());
    }

    function stockMedia($bdd, $nom_fichier, $description, $url, $url_cible, $alt, $credits)
    {


        $sql = 'INSERT INTO medias(medias.nom, medias.description,medias.url,medias.url_cible,medias.alt,medias.credits)
 VALUES(:nom,:description,:url,:url_cible,:alt,:credits)';

        $q = $bdd->prepare($sql);


        $lines = $q->execute(array(
            'nom' => $nom_fichier,
            'description' => $description,
            'url' => $url,
            'url_cible' => $url_cible,
            'alt' => $alt,
            'credits' => $credits
        ));


        return $lines;
    }
}
