<?php

// Configuração da conexão PDO
$servername = "localhost";
$username = "root";
$password = "Ts101507@";
$dbname = "crud_php_bootstrap";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>





