<?php
require_once './Db.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();

$query_event = "INSERT INTO series (number, title, text, id_the_script) VALUES (?, ?, ?, ?)";
$response = $db->insert($query_event, array($data['number'], $data['title'], $data['text'], $data['id_the_script']));

if ($response) {
    $result = ['db' => true];
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка ' . $data['text'] . '!</div>'];
}

header('Content-Type: application/json');
echo json_encode($result);
