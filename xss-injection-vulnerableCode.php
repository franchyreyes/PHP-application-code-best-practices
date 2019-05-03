<?php

//Simulate injected post data
//vulnerable code
$_POST["username"] = "hhhh";
$_POST["comment"] = '<script>alert("document.cookie")</script>';

if ($_POST && isset($_POST["username"]) && isset($_POST["comment"])) {

    $result = null;
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=codetest", "root", "");
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $pdo->query("INSERT INTO blog (username,comment) VALUES ('{$_POST['username']}','{$_POST['comment']}')");

        //Then                
        $stmt = $pdo->query("SELECT * FROM blog WHERE username ='{$_POST['username']}'");
        $result = $stmt->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if ($result != null) {
        echo $result[0]->comment;
    }
}
