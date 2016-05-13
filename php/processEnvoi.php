<?php
    header('Content-Type: text/html; charset=utf-8');

    // CONDITIONS NOM
    if ( (isset($_POST["nom"])) && (strlen(trim($_POST["nom"])) > 0) ) {
        $nom = stripslashes(strip_tags($_POST["nom"]));
    } else {
        echo "Merci d'écrire un nom <br />";
        $nom = "";
    }

    // CONDITIONS SUJET
    if ( (isset($_POST["sujet"])) && (strlen(trim($_POST["sujet"])) > 0) ) {
        $sujet = stripslashes(strip_tags($_POST["sujet"]));
    } else {
        echo "Merci d'écrire un sujet <br />";
        $sujet = "";
    }

    // CONDITIONS MESSAGE
    if ( (isset($_POST["msg"])) && (strlen(trim($_POST["msg"])) > 0) ) {
        $msg = stripslashes(strip_tags($_POST["msg"]));
    } else {
        echo "Merci d'écrire un message<br />";
        $msg = "";
    }

    // Les messages d'erreurs ci-dessus s'afficheront si Javascript est désactivé

    // PREPARATION DES DONNEES
    $ip           = $_SERVER["REMOTE_ADDR"];
    $hostname     = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
    $destinataire = "sam.mignot@gmail.com";
    $objet        = "Site 360TV : " . $sujet;
    $contenu      = "Nom de l'expéditeur : " . $nom . "\r\n";
    $contenu     .= $message . "\r\n\n";
    $contenu     .= "Adresse IP de l'expéditeur : " . $ip . "\r\n";
    $contenu     .= "DLSAM : " . $hostname;

    $headers  = "CC: " . $email . " \r\n"; // ici l'expediteur du mail
    $headers .= "Content-Type: text/plain; charset=\"ISO-8859-1\"; DelSp=\"Yes\"; format=flowed /r/n";
    $headers .= "Content-Disposition: inline \r\n";
    $headers .= "Content-Transfer-Encoding: 7bit \r\n";
    $headers .= "MIME-Version: 1.0";

    // SI LES CHAMPS SONT MAL REMPLIS
    if ( (empty($nom)) && (empty($sujet)) && (empty($email)) && (!filter_var($email, FILTER_VALIDATE_EMAIL)) && (empty($msg)) ) {
        echo 'echec :( <br /><a href="contact360.html">Retour au formulaire</a>';
    } else {
        // ENCAPSULATION DES DONNEES 
        mail($destinataire, $objet, utf8_decode($contenu), $headers);
        echo 'Formulaire envoyé';
    }

    // Les messages d'erreurs ci-dessus s'afficheront si Javascript est désactivé

?>