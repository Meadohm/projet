<?php

 // Initialiser la session
        session_start();

//  Supprimer ou desactiver les variables de la session
        session_unset();

// Détruire la session. Supprime aussi le fichier serveur de session
        session_destroy();

 // Redirection vers la page de connexion
    header("Location: ../../index.php");

?>