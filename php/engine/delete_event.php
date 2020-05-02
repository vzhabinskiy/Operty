<?php
session_start();

$connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $query_event = "DELETE FROM timetable WHERE id=:id";
    $delete_event = $connect->prepare($query_event);
    $delete_event->bindParam("id", $id);
    if($delete_event->execute()) {
        $_SESSION['msg'] = '<div id="success-close"> Мероприятие удалено успешно!
    <button id="button-close"><img class="button-delete-img" src="../../source/img/delete1.png"></button></div>';
        header("Location: ../views/timetable.php");
    }else {
        $_SESSION['msg'] = '<div> Ошибка при удалении события!</div>';
        header("Location: ../views/timetable.php");
    }
} else {
    $_SESSION['msg'] = '<div> Ошибка при удалении события!</div>';
    header("Location: ../views/timetable.php");
}