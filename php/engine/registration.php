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
if (!empty($user['email']) && !empty($user['password'])){
    $response = $db->registration($user['full_name'], $user['age'],$user['id_gender'], $user['id_profession'], $user['place_of_birth'], $user['about_me'],
    $user['email'], $user['password']);
    if ($response['status']) {
        $_SESSION['user_id'] = $response['id'];
        // echo 'you are successfully registered ';
        header("Location: ../views/index.php");    
    } else {
        echo 'not registered.'.$response['errorInfo'];
    }
} else {
    die('Enter all data');
}