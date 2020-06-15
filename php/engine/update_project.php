<?php
require_once './Db.php';
require_once "../engine/Img.php";
$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();
$img = new Img();
$oldPath = $db->selectPathProject();
$newImg = null;
if (!empty($_FILES['img']['type'])) {
    $newImg = $img->updatePhoto($oldPath[0]['img']);
}
if (!empty($newImg)) {
    $newImg = $newImg['path'];
} else {
    $newImg = $oldPath[0]['img'];
}
$query_event = "UPDATE `projects` SET name= ?, id_type_of_project=?, img =? WHERE id= ?";

$response = $db->update($query_event, array($data['name'],  $data['id_type_of_project'], $newImg,  $data['id']));
if ($response) {
    $result = ['db' => true, 'msg' => '<div> Проект отредактирован успешно!</div>'];
} else {
    $result = ['db' => true, 'msg' => '<div> Ошибка !</div>'];
}

header('Content-Type: application/json');
echo json_encode($result);
