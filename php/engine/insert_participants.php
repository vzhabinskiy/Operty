<?php

require_once './Db.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();

$query_event = "INSERT INTO `participants` (id_project, id_user) VALUES (?, ?)";
// var_dump($data);
$response = $db->insert($query_event, array(
    $data['id_project'], $data['id_user']
));

if ($response) {
    $result = ['db' => true, 'msg' => '<div> Учстник успешно добавлен </div>'];
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка </div>'];
}

header('Content-Type: application/json');
echo json_encode($result);
