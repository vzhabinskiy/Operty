<?php
require_once './Db.php';

$db = new Db();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $response = $db->delete('timetable', $id);

    if ($response) {
        $_SESSION['msg'] = '<div id="success-close"> Мероприятие удалено успешно!
    <button id="button-close"><img class="button-delete-img" src="../../source/img/delete1.png"></button></div>';
    } else {
        $_SESSION['msg'] = '<div> Ошибка при удалении события!</div>';
    }
    header("Location: ../views/timetable.php?id_project=" . $_SESSION['id_project'] . "");
}
