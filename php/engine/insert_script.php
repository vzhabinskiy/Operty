<?php

require_once './Db.php';


$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();

$query_event = "INSERT INTO `the_scripts` (title, id_project) VALUES (?, ?)";

$response = $db->insert($query_event, array(
    $data['title'], $data['id_project']
));


if ($response) {
    $result = ['db' => true, 'msg' => '<div> Сценарий создан успешно </div>'];
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка </div>'];
}

header('Content-Type: application/json');
echo json_encode($result);
