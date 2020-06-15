<?php
require_once './Db.php';

$db = new Db();

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if (!empty($id)) {
    $response = $db->delete('projects', $id);
    header("Location: ../views/index.php");
}
