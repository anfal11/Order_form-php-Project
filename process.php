<?php

// Process result
$result = "";

// Connect To DATABASE
$dbHost = "localhost"; 
$dbName = "order_form"; 
$dbChar = "utf8"; 
$dbUser = "root"; 
$dbPass = ""; 
try {
    $pdo = new PDO(
        "mysql:host=$dbHost; dbname=$dbName; charset=$dbChar",
        $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $ex) {$result = $ex->getMessage(); }

// SAVE ORDER TO DATABASE
if ($result == "") {
    try{
        $smtp = $pdo->prepare("INSERT INTO `orders` (`name`,`email`,`quantity`) VALUES (?,?,?)");
        $smtp-> execute([
            $_POST['name'], $_POST['email'], $_POST['quantity']
        ]);
    } catch (Exception $ex) { $result = $ex->getMessage();}
}
?>