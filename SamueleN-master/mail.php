<?php

$frm_name  = "Youname";
$recepient = "pavelcdn@gmail.com";
$sitename  = "Название Сайта";
$subject   = "Новая заявка с сайта \"$sitename\"";

$name = trim($_POST["name"]);
$phone = trim($_POST["phone"]);
$email = trim($_POST["email"]);

$message = 'сообщение с сайта <br>';
if (!empty($name)) {
    $message .= "Имя: $name <br>";
}
if (!empty($phone)) {
    $message .= "Телефон: $phone <br>";
}
if (!empty($email)) {
    $message .= "E-mail: $email <br>";
}


mail($recepient, $subject, $message, "From: $frm_name <$email>" . "\r\n" . "Reply-To: $email" . "\r\n" . "X-Mailer: PHP/" . phpversion() . "\r\n" . "Content-type: text/html; charset=\"utf-8\"");
