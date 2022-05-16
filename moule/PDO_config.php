<?php
                    // Connexion a la base de données

    $host = 'localhost';
    $dbname = 'dgbf';
    $username = 'root';
    $password = 'MySQL8@root';
 
  try {
            //instanciation d'un objet PDO pour creer une connexion à la base de données
    $bdconn = new PDO("mysql:host=$host; dbname=$dbname", $username, $password);
    
              //On définit le mode d'erreur de PDO sur Exception
              $bdconn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "Connecté à $dbname sur $host avec succès.";
    
    } 
    catch (PDOException $e) {

                   /*On capture les exceptions si une exception est lancée et on affiche
                        *les informations relatives à celle-ci*/
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
    }

    //On ferme la connexion

    $bdconn=null;

?>