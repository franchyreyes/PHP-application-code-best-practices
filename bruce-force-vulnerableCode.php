<?php

//Simulate bruce force attempt with minor changes to the password
//vulnerable code
$_POST["username"] = 'admin';
$_POST["password"] = 'azcdrfhgt';

if ($_POST && isset($_POST["username"]) && isset($_POST["password"])) {

    $result = false;
    $password = md5($_POST["password"]);
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=codetest", "root", "");
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT * FROM users WHERE 
        username ='{$_POST['username']}' and password = '$password'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if ($result && count($result)) {
        // On Success
    } else {
        // On failure
        echo "Login unsuccessful";
    }
}
