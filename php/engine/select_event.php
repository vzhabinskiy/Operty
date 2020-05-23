<?php
$connect = new PDO('mysql:host=localhost;dbname=operty', 'root', '');

$data = array();
$query = "SELECT id, title, responsible, place, start, end, description  FROM timetable ORDER BY id";
$statement = $connect->prepare($query);
$statement->execute();
$response = $statement->fetchAll();
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