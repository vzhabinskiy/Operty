<?php
session_start();

$connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$data_start = str_replace('/', '-', $data['start']);
$data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));

$data_end = str_replace('/', '-', $data['end']);
$data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));

$query_event = "INSERT INTO timetable (title, responsible, place, start, end, description) VALUES (:title, :responsible, :place, :start, :end, :description)";
$insert_event = $connect->prepare($query_event);
$insert_event->bindParam(':title', $data['title']);
$insert_event->bindParam(':responsible', $data['responsible']);
$insert_event->bindParam(':place', $data['place']);
$insert_event->bindParam(':start', $data_start_conv);
$insert_event->bindParam(':end', $data_end_conv);
$insert_event->bindParam(':description', $data['description']);


if ($insert_event->execute()) {
    $response = ['db' => true, 'msg' => '<div> Событие создано успешно '.$data['title'].'!</div>'];
    $_SESSION['msg'] = '<div id="success-close"> Мероприятие "'.$data['title'].'" успешно создано! 
    <button id="button-close"><img class="button-delete-img" src="../../source/img/delete.png"></button></div>';
} else {
    $response = ['db' => true, 'msg' => '<div> Ошибка '.$data['title'].'!</div>'];
}

header('Content-Type: application/json');
echo json_encode($response);


