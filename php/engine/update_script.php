<?php
require_once './Db.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();
$query_event = "UPDATE `the_scripts` SET title= ? WHERE id= ?";
$response = $db->update($query_event, array(
    $data['title'], $data['id']
));
if ($response) {
    $result = ['db' => true, 'msg' => '<div> Сценарии отредактирован успешно!</div>'];
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка !</div>'];
}
header('Content-Type: application/json');
echo json_encode($result);
