<?php
require_once './Db.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();
$query_event = "UPDATE users SET full_name= ?, age=?, id_gender=?, id_profession=?, place_of_birth=?, about_me=? WHERE id= ?";
$response = $db->update($query_event, Array(
    $data['full_name'], $data['age'], $data['id_gender'], $data['id_profession'], $data['place_of_birth'], $data['about_me'], $data['id']));
    if ($response) {
        $result = ['db' => true, 'msg' => '<div> Профиль отредактирован успешно!</div>'];
        $_SESSION['msg'] = '<div id="success-close"> Профиль отредактирован успешно! 
        <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
    } else {
        $result = ['db' => true, 'msg' => '<div> Ошибка !</div>'];
        $_SESSION['msg'] = '<div> Профиль неотредактирован !</div>';
    }
    header('Content-Type: application/json');
    echo json_encode($result);
    