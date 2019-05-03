<?php

//Simulate injected post data
//vulnerable code
$_POST["username"] = "hhhh";
$_POST["comment"] = '<script>alert("document.cookie")</script>';

if ($_POST && isset($_POST["username"]) && isset($_POST["comment"])) {

    // Looking for an alpha numeric value
    $cleanUsername = ctype_alnum($_POST["username"]) ? $_POST["username"] : false;

    // Looking for tag based injection and  stripping the tags
    $cleanComment = strip_tags($_POST["comment"]) ?? false;

    if ($cleanUsername && $cleanComment) {
        //Persist the data with this fields but first, escaping with
        //htmlspecialchars($cleanComment)
        //htmlentities($cleanComment);
        // Or your framework escaping method
    }
}
