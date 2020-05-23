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
        header("Location: ../views/index.php");    
    } else { 
        $_SESSION['msg'] = '<div id="success-close"><p style ="margin-left:585px;">I failed to registr. This email already exists</p>
        <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
        header("Location: ../views/registr.php");
    }
} else {
    die('Enter all data');
}