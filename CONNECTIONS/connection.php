<?php 
    // database connection
    $servername="localhost";
    $username="root";
    $password='';
    $dbname="tivannifoodpalacedb";

    try{
        $con = new PDO("mysql:host=$servername;dbname=$dbname;",
        $username,$password);
        
    }
    catch(PDOException $ex){
        echo "Error Database Connection Failed: ".$ex->getMessage();
            
    }
?>