<?php
require_once './Db.php';

$db = new Db();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $response = $db->delete('series', $id);
    header("Location: ../views/editor.php?id_project=" . $_SESSION['id_project'] . "&id_script=" . $_SESSION['id_script'] . "");
}
