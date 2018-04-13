<?php
$mail = $_POST['email']; // Déclaration de l'adresse de destination.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
    $returnLign = "\r\n";
}
else
{
    $returnLign = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "verification email";
$message_html = "<html><head></head><body><b>Hi</b>Click on the link to validate your address <i>script PHP</i>.</body></html>";
//==========

//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========

//=====Définition du sujet.
$sujet = "verification email";
//=========

//=====Création du header de l'e-mail.
$header = "From: \"WeaponsB\"<nicolas.jerome1@viacesi.fr>".$returnLign;
$header.= "Reply-to: \"WeaponsB\" <nicolas.jerome1@viacesi.fr>".$returnLign;
$header.= "MIME-Version: 1.0".$returnLign;
$header.= "Content-Type: multipart/alternative;".$returnLign." boundary=\"$boundary\"".$returnLign;
//==========

//=====Création du message.
$message = $returnLign."--".$boundary.$returnLign;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$returnLign;
$message.= "Content-Transfer-Encoding: 8bit".$returnLign;
$message.= $returnLign.$message_txt.$returnLign;
//==========
$message.= $returnLign."--".$boundary.$returnLign;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$returnLign;
$message.= "Content-Transfer-Encoding: 8bit".$returnLign;
$message.= $returnLign.$message_html.$returnLign;
//==========
$message.= $returnLign."--".$boundary."--".$returnLign;
$message.= $returnLign."--".$boundary."--".$returnLign;
//==========

//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
?>
