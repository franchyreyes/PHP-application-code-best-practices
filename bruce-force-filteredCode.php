<?php

//Simulate bruce force attempt with minor changes to the password
$_POST["username"] = 'admin';
$_POST["password"] = 'azcdrfhgt';

if ($_POST && isset($_POST["username"]) && isset($_POST["password"])) {
    //Execute brute force detection code here
    $cleanUser = ctype_alnum($_POST['username']) ? $_POST['username'] : false;
    if ($cleanUse) {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=codetest", "root", "");
            // set the PDO error mode to exception
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $pdo->query("SELECT * FROM users WHERE username ='{$_POST['username']}'");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    if ($result && count($result) && password_verify($_POST["password"], $result["password"])) {
        // On Success
        // Always escaping any input used
    } else {
        // On failure
        echo "Login unsuccessful";
    }
}
