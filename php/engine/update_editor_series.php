<?php
require_once './Db.php';

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();
$query_event = "UPDATE `series` SET number =?, title= ?, text =?  WHERE id= ?";
$response = $db->update($query_event, array(
    $data['number'], $data['title'], $data['text'], $data['id']
));
if ($response) {
    $result = ['db' => true, 'msg' => '<div> Серия отредактирована успешно!</div>'];
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка !</div>'];
}
header('Content-Type: application/json');
echo json_encode($result);
