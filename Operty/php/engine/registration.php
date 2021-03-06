<?php
require './Db.php';
$user = [];
foreach ($_POST as $key => $value){
    $keyUser = strval(htmlspecialchars($key));
    $valueUser = strval(htmlspecialchars($value));
    $user[$keyUser] = $valueUser;
}
$db = new Db();
$hashedParams = ['password'];
foreach($user as $key => &$value) {
    if (in_array($key, $hashedParams)) {
        if ($value != null) {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }
    }
}
if  (!empty($user['email']) && !empty($user['password'])){
    $response = $db->registration($user['email'], $user['password']);
    if ($response['status']) {
        // echo 'you are successfully registered ';
        header("Location: ../../index.html");
    } else {
        echo 'not registered.'.$response['errorInfo'];
    }
} else {
    die('Enter all data');
}