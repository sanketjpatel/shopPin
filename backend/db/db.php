<?php

/*
 * Developed by: Tanmay Garg
 * Contact: tanmaygarg@ymail.com
 */
$host = "localhost";
$database = "shoppin";
$username = "root";
$password = "123456";

try{
    // Create a new connection.
    // \PDO::ATTR_ERRMODE enables exceptions for errors.  This is optional but can be handy.
     $link = new \PDO("mysql:host=$host;dbname=$database", "$username", "$password", array(
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            )
    );
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>
                 