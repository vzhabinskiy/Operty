<?php
require './Db.php';
$user = [];
foreach ($_POST as $key => $value) {
    $keyUser = strval(htmlspecialchars($key));
    $valueUser = strval(htmlspecialchars($value));
    $user[$keyUser] = $valueUser;
}
$db = new Db();
if (!empty($user['email'])) {
    $response = $db->getPasswordByEmail($user['email']);
    if ($response['status']) {
        if (password_verify($user['password'], $response['data']['password'])) {

            $_SESSION['user_id'] = $response['data']['id'];

            header("Location: ../views/index.php");
        } else {
            $_SESSION['msg'] = '<div id="success-close"><p>Неверный логин или пароль</p>
            <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
            header("Location: ../views/login.php");
        }
    } else {
        $_SESSION['msg'] = '<div id="success-close"><p>' . $response['errorInfo'] . '</p>
        <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
        header("Location: ../views/login.php");
    }
}
