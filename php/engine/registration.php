<?php
require './Db.php';
$mistakes = "";
$user = [];
foreach ($_POST as $key => $value) {
    $keyUser = strval(htmlspecialchars($key));
    $valueUser = strval(htmlspecialchars($value));
    $user[$keyUser] = $valueUser;
}
if (!preg_match('/^[A-Za-zА-Яа-яЁё ]{1,30}+$/', $user['full_name'])) {
    $mistakes .= "Только буквы от 1 до 30 <br>";
}
if (!preg_match('/^[0-9]{1,3}+$/', $user['age'])) {
    $mistakes .= "Введите корректный возраст <br>";
}
if (!preg_match('/^.{1,50}+$/', $user['place_of_birth'])) {
    $mistakes .= "Максимальное количество символов - 50  <br>";
}
if (!preg_match('/^([A-Za-z0-9_\.-]+)@([A-Za-z0-9_\.-]+)\.([A-Za-z\.]{2,18})+$/', $user['email'])) {
    $mistakes .= "Введите корректный E-mail <br>";
}
if (!preg_match('/^.{4,255}+$/', $user['password'])) {
    $mistakes .= "Минимальное количество символов - 4  <br>";
}
if (!empty($mistakes)) {
    $_SESSION['msg'] =  ("<p style='text-align: center; color: red; margin-top: 20px'>$mistakes</p>");
    header("Location: ../views/registr.php");
    die("");
}
$db = new Db();
$hashedParams = ['password'];
foreach ($user as $key => &$value) {
    if (in_array($key, $hashedParams)) {
        if ($value != null) {
            $value = password_hash($value, PASSWORD_DEFAULT);
        }
    }
}
if (!empty($user['email']) && !empty($user['password'])) {
    $response = $db->registration(
        $user['full_name'],
        $user['age'],
        $user['id_gender'],
        $user['id_profession'],
        $user['place_of_birth'],
        $user['about_me'],
        $user['email'],
        $user['password']
    );
    if ($response['status']) {
        $_SESSION['user_id'] = $response['id'];
        header("Location: ../views/index.php");
    } else {
        $_SESSION['msg'] = '<div id="success-close"><p>' . $response['errorInfo'] . '</p>
        <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
        header("Location: ../views/registr.php");
    }
} else {
    die('Введите все данные');
}
