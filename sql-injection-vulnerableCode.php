<?php

//Simulate injected get data
//vulnerable code
$_GET['id'] = ';UPDATE blog SET comment=attacker WHERE id = 18;';
$_GET['new_password'] = 'xshfjeytteedrewo';
$_GET['submit'] = 'submit';

if ($_GET && isset($_GET["submit"])) {

    $result = null;
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=codetest", "root", "");
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->query("SELECT username FROM blog WHERE id ='{$_GET['id']}'");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
