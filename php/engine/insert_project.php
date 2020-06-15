<?php

require_once './Db.php';
require_once "../engine/Img.php";

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$db = new Db();
$img = new Img();
$newImg = $img->insertPhoto();
if ($newImg["status"]) {
    $query_event = "INSERT INTO `projects` (name, id_type_of_project, id_user, img) VALUES (?, ?, ?, ?)";

    $response = $db->insert($query_event, array(
        $data['name'], $data['id_type_of_project'], $data['id_user'],  $newImg['path']
    ));

    if ($response) {
        $result = ['db' => true, 'msg' => '<div> Проект создан успешно </div>'];
    } else {
        $result = ['db' => true, 'msg' => '<div> Ошибка </div>'];
    }
} else {
    $result = ['msg' => $newImg["message"]];
}



header('Content-Type: application/json');
echo json_encode($result);
