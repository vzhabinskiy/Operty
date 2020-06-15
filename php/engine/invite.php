<?php
$email = $_POST['email'];
$email = htmlspecialchars($email);
$email = urldecode($email);
$email = trim($email);
mail($email, 'Приглашение в Operty', 'Здравствуй! Приглашаю тебя в сервис https://operty.ru.');
