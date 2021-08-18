<?php

require 'model/mediaModel.php';
require 'src/class.upload.php';




$foo = new upload($_FILES['img']); 
if ($foo->uploaded) {
   // save uploaded image with no changes
   $foo->process('data/media/');
   if ($foo->processed) {
     echo 'original image copied';
   } else {
     echo 'error : ' . $foo->error;
   }
   
   // save uploaded image with a new name,
   // resized to 100px wide
   $nom_fichier = mktime().basename($_FILES['img']['name']);
   $description =htmlspecialchars( $_POST['description']);
   $url = 'data/media/'.$nom_fichier;
   $url_cible = htmlspecialchars($_POST['url_cible']);
   $alt = htmlspecialchars( $_POST['alt']);
   $credits = htmlspecialchars($_POST['credits']);

 $foo->file_new_name_body = $nom_fichier;
   $foo->image_resize = true;
   $foo->image_x = 250;
   $foo->image_y = 200;
   $foo->image_ratio_y = true;
   $foo->process('data/media/min');
   if ($foo->processed) {
     echo 'image est renommée, retailler en miniature x=250 , y=200';
     $foo->clean();
   } else {
     echo 'error : ' . $foo->error;
   } 
}  

stockMedia(
    $bdd,
    $nom_fichier,
    $description,
    $url,
    $url_cible,
    $alt,
    $credits,
    
   
)or die('PB d\'envoi en BDD');



require 'formulaire_ajout_img.php';
?>

