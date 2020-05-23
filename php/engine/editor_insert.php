<?php
session_start();

$connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$query_event = "INSERT INTO series (number, title, text) VALUES (:number, :title, :text)";
$insert_event = $connect->prepare($query_event);
$insert_event->bindParam(':number', $data['number']);
$insert_event->bindParam(':title', $data['title']);
$insert_event->bindParam(':text', $data['text']);

if ($insert_event->execute()) {
    $response = ['db' => true, 'msg' => '<div> Событие создано успешно '.$data['text'].'!</div>'];
    $_SESSION['msg'] = '<div id="success-close"> Мероприятие "'.$data['text'].'" успешно создано! 
    <button id="button-close"><img class="button-delete-img" src="img/delete.png"></button></div>';
} else {
    $response = ['db' => true, 'msg' => '<div> Ошибка '.$data['text'].'!</div>'];
}

header('Content-Type: application/json');
echo json_encode($response);