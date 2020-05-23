<?php
session_start();

$connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$data_start = str_replace('/', '-', $data['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $data['end']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$query_event = "UPDATE timetable SET title=:title, responsible=:responsible, place=:place, start=:start, end=:end, description=:description WHERE id=:id";

$update_event = $connect->prepare($query_event);
$update_event->bindParam(':title', $data['title']);
$update_event->bindParam(':responsible', $data['responsible']);
$update_event->bindParam(':place', $data['place']);
$update_event->bindParam(':start', $data_start_conv);
$update_event->bindParam(':end', $data_end_conv);
$update_event->bindParam(':description', $data['description']);
$update_event->bindParam(':id', $data['id']);


if ($update_event->execute()) {
    $response = ['db' => true, 'msg' => '<div> Событие отредактировано успешно '.$data['title'].'!</div>'];
    $_SESSION['msg'] = '<div id="success-close"> Мероприятие "'.$data['title'].'" успешно отредактировано! 
    <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
} else {
    $response = ['db' => true, 'msg' => '<div> Ошибка '.$data['title'].'!</div>'];
    $_SESSION['msg'] = '<div> Событие неотредактировано '.$data['title'].'!</div>';
}

header('Content-Type: application/json');
echo json_encode($response);


