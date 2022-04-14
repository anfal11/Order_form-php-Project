<?php

// Process result
$result = "";

// Connect To DATABASE
$dbHost = "localhost"; 
$dbName = "test"; 
$dbChar = "utf8"; 
$dbUser = "root"; 
$dbPass = ""; 
try {
    $pdo = new PDO(
        "mysql:host=$dbHost; dbanme=$dbName; charset=$dbChar",
        $dbUser, $dbPass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $ex) {$result = $ex->getMessage(); }

// SAVE ORDER TO DATABASE
if ($result == "") {
    try{
        $smtp = $pdo->prepare("INSERT INTO `orders` (`user_name`,`user_email`,`quantity`) VALUES (?,?,?)");
        $smtp-> execute([
            $_POST['user_name'], $_POST['user_email'], $_POST['quantity']
        ]);
    } catch (Exception $ex) { $result = $ex->getMessage();}
}

// SEND ORDER USING EMAIL (optional)
if ($result =="") {
    $to = "admin@site.com";
    $subject = "ORDER RECEIVED";
    $message = "";
    foreach ($_POST as $k => $v) { $message .= "$k - $v\r\n"; }
    if (!@mail ($to, $subject, $message)) { 
        $result = "Failed to send mail";
    }
}