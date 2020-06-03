<?php
require_once './Db.php';

$db = new Db();

$data = array();

$query = "SELECT timetable.id, timetable.title, timetable.responsible, timetable.place, timetable.start, timetable.end, timetable.description  FROM timetable 
    JOIN projects ON timetable.id_project = projects.id
    JOIN users ON projects.id_user = users.id WHERE users.id = ".$_SESSION['user_id']." ORDER BY id ";
$response = $db->selectAll($query);
foreach($response as $row)
{
    $data[] = array(
        'id' => $row["id"],
        'responsible' => $row["responsible"],
        'title' => $row["title"],
        'place' => $row["place"],
        'start' => $row["start"],
        'end' => $row["end"],
        'description' => $row["description"]
    );
}
echo json_encode($data);