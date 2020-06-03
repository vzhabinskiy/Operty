<?php
require_once './Db.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();

$query_event = "INSERT INTO series (number, title, text) VALUES (?, ?, ?)";
$response = $db->insert($query_event, Array($data['number'], $data['title'], $data['text']));

if ($response) {
    $result = ['db' => true, 'msg' => '<div> Событие создано успешно '.$data['text'].'!</div>'];
    $_SESSION['msg'] = '<div id="success-close"> Мероприятие "'.$data['text'].'" успешно создано! 
    <button id="button-close"><img class="button-delete-img" src="img/delete.png"></button></div>';
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка '.$data['text'].'!</div>'];
}

header('Content-Type: application/json');
echo json_encode($result);