<?php
$username = 'root';
$password = 'psfwpec07';
try {
    $conn = new PDO('mysql:host=192.168.203.42;dbname=ativos', $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
?>