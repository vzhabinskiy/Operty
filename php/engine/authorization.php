<?php
require './Db.php';
$user = [];
foreach ($_POST as $key => $value){
    $keyUser = strval(htmlspecialchars($key));
    $valueUser = strval(htmlspecialchars($value));
    $user[$keyUser] = $valueUser;
}
$db = new Db();
if (!empty($user['email'])){
    $response = $db->getPasswordByEmail($user['email']);
    if ($response['status']) {
        if (password_verify($user['password'], $response['data']['password'])) {
           
            $_SESSION['user_id'] = $response['data']['id'];
            
            // echo 'you are logged in successfully, '.$response['data']['email'];
            header("Location: ../views/index.php");
        } else {
            die('Wrong username or password');
        }
    } else {
        echo 'I failed to join.'.$response['errorInfo'];
    }
} else {
    die('Wrong username or password');
}