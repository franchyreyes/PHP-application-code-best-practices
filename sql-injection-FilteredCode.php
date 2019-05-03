<?php

//Simulate injected get data
//vulnerable code
$_GET['id'] = ';UPDATE blog SET comment=attacker WHERE id = 18;';
$_GET['new_password'] = 'xshfjeytteedrewo';
$_GET['submit'] = 'submit';

if ($_GET && isset($_GET['submit']) && isset($_GET['id'])) {

    // FIlter type coercion on integer type identifier
    $cleanID = (int)$_GET['id'];

    // Filter by using the ctype_alnum function for none integer-type
    // identifiers, and assuming here alpha numeric
    $cleanID = ctype_alnum($_POST['id']) ? $_POST['id'] : false;

    // Filter by strip_tags , as password can be just about any character combination
    $cleanPass = strip_tags($_POST['new_password']) ?? false;

    if ($cleanPass && $cleanID) {
        //Persist the data with this fields but first, escaping with
        //htmlspecialchars($cleanComment)
        //htmlentities($cleanComment);
        // Or your framework escaping method
    } else {
        echo 'Data invalid';
    }
}
