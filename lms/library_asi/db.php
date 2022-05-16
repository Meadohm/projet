<?php
class db{
protected $connection;

function setconnection(){
    try{
        $this->connection=new PDO("mysql:host=localhost; dbname=library_managment","root","MySQL8@root");
        // echo "Done";
    }catch(PDOException $e){
        echo "Error";
        //die();

    }
}

}
