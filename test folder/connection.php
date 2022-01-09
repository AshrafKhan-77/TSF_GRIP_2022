<!-- PHP code to establish connection with the localserver -->
<?php
        
    $user = 'root';
    $password = ''; 
    $database = 'db_connect'; 
    $servername='localhost';
    $mysqli = new mysqli($servername, $user, $password, $database);
        
    // Checking for connections
    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
    }
?>