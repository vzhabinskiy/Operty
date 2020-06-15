<?php

require_once './Db.php';


$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$data_start = str_replace('/', '-', $data['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $data['end']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$db = new Db();

$query_event = "INSERT INTO timetable (title, responsible, place, start, end, description, id_project) VALUES (?, ?, ?, ?, ?, ?, ?)";

$response = $db->insert($query_event, array(
    $data['title'], $data['responsible'], $data['place'], $data_start_conv, $data_end_conv, $data['description'], $data['id_project']
));


if ($response) {
    $result = ['db' => true, 'msg' => '<div> Событие создано успешно ' . $data['title'] . '!</div>'];
    $_SESSION['msg'] = '<div id="success-close"> Мероприятие "' . $data['title'] . '" успешно создано! 
    <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка ' . $data['title'] . '!</div>'];
}

header('Content-Type: application/json');
echo json_encode($result);
