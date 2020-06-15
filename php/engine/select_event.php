<?php
require_once './Db.php';

$db = new Db();

$data = array();

$query = "SELECT timetable.id, timetable.title, timetable.responsible, timetable.place, timetable.start, timetable.end, timetable.description  FROM `timetable`
    JOIN `projects` ON timetable.id_project = projects.id
    LEFT JOIN `participants` ON projects.id = participants.id_project
    JOIN `users` ON projects.id_user = users.id OR participants.id_user = users.id WHERE users.id = :user_id AND projects.id = :id_project GROUP BY timetable.id ";
$response = $db->selectEvents($query);
foreach ($response as $row) {
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
