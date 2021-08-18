<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Bibliothèque de média</title>
</head>

<body>
    <?php

    if (isset($erreur)) {
        echo $erreur;
    }


    ?>
    <h1>Téléverser un média</h1>


    <form action="bibliotheque.php" method="post" enctype="multipart/form-data">
        <fieldset>
            <div class="img">
                <label for="img">Sélectioner une image (.jpg, .png, .gif)</label>
            </div>

            <input type="file" name="img">
            <div class="description">
                <label for="description">Veuillez inserer une description :</label>
                <textarea name="description" id="description" cols="30" rows="10"></textarea>
            </div>

            <div class="url_cible">
                <label for="url_cible">Inserer le lien du site partenaire :
                    <input type="url" name="url_cible" id="url_cible"></label>
            </div>
            <div class="alt">
                <label for="alt">Texte alternatif d'une image : </label>
                <textarea name="alt" id="alt" cols="30" rows="10"></textarea>
            </div>

            <div class="credits">
                <label for="credits">Credits :
                    <textarea name="credits" id="credits" cols="30" rows="10"></textarea></label>
            </div>
            <div>
                <label for="selectionner">Tout sélectionner</label>
                <input type="checkbox" name="selectionner" id="toutselectionner">
            </div>
            <input type="submit" name="Envoyer">
            <button type="submit">Téléverser</button>
    </form>

    <div>
        <label for="selectionner">Tout sélectionner</label>
        <input type="checkbox" name="selectionner" id="toutselectionner">
    </div>

    <?php


    function lister_images($img)
    {
        if (is_dir($img)) {
            if ($iteration = opendir($img)) {
                while (($file = readdir($iteration)) !== false) {
    ?>
                    <form action="" method="post">

                        <div class="affichage_img">
                            <label for="affichage_img">
                                <img src="<?php echo $img . $file; ?>">
                                <a href="<?php echo $img . $file; ?>" alt=""></a>


                            </label>
                            <input type="checkbox" name="img" id="affichage_img" class="affichage_img">
                            <button type="submit"><a class="supprimer" href="supprimerImage.php?id=<?= $_GET['id']; ?>" onclick="return confirm('Ètes-vous sûr de vouloir supprimer cette image ?')">Supprimer</a></button>

                        </div>

                    </form>
    <?php
                }
                closedir($iteration);
            }
        }
    }
    lister_images("data/media/min/");
    ?>

    </fieldset>
    <script src="js/script.js"></script>
</body>

</html>