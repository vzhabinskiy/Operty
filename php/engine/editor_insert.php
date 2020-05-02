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
    $ret = ['sit' => true, 'msg' => '<div> Событие создано успешно '.$data['text'].'!</div>'];
    $_SESSION['msg'] = '<div id="success-close"> Мероприятие "'.$data['text'].'" успешно создано! 
    <button id="button-close"><img class="button-delete-img" src="img/delete.png"></button></div>';
} else {
    $ret = ['sit' => true, 'msg' => '<div> Ошибка '.$data['text'].'!</div>'];
}

header('Content-Type: application/json');
echo json_encode($ret);






































// $editorContent = $statusMsg = '';

// if(isset($_POST['submit'])){
//     $editorContent = $_POST['mytextarea'];
    
//     if(!empty($editorContent)){
//         // $insert = $connect->query("INSERT INTO the_scripts (text) VALUES ('".$editorContent."', NOW())");
//         $query_event = "INSERT INTO scripts (text) VALUES ('".$editorContent."', NOW())";
//         $insert = $connect->prepare($query_event);
//         if($insert){
//             $statusMsg = "Успех";
//         } else {
//             $statusMsg = "Неуспех";
//         }
//     } else {
//         $statusMsg = "Добавьте текст";
//     }
// }