<?php
            $servername = 'localhost';
            $username = 'root';
            $password = 'MySQL8@root';
            $dbname = 'dgbf';
            
            //On établit la connexion
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            
            //On vérifie la connexion
            if(!$conn){
            
                die('Erreur: ' .mysqli_connect_error());
            }
            // echo 'Connexion réussie';


        ?>