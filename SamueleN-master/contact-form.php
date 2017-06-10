<?php
if (isset($_POST['g-recaptcha-response'])) {
    $url_to_google_api = 'https://www.google.com/recaptcha/api/siteverify';
    $secret_key = '6Ldvbx8UAAAAAOleiMM20yrlVV0kBSFU_MavHWUQ';
    $query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];
    $data = json_decode(file_get_contents($query));
    if ($data->success) {
        // Продолжаем работать с данными для авторизации из POST массива
    } else {
        exit('Sorry but it looks like you are a robot');
    }
} else {
    exit('You did not pass the validation reCaptcha');
}

$post = (!empty($_POST)) ? true : false;

if($post)
{
$email = trim($_POST['email']);
$name = htmlspecialchars($_POST['name']);
$email = htmlspecialchars($_POST['email']);
$sub = htmlspecialchars($_POST['sub']);
$message = htmlspecialchars($_POST['message']);
$tel = htmlspecialchars($_POST["tel"]);

$error = '';
                

if(!$name)
{
$error .= 'Please enter your name.<br />';
}

if(!$tel)
{
$error .= "Please enter phone.<br />";
}
if(!$sub)
{
$error .= "Please enter a subject.<br />";
}

// Проверка сообщения (length)
if(!$message || strlen($message) < 1)
{
$error .= "Enter your message.<br />";// В этой строчке ставиться минимальное ограничение на написание букв.
}

if(!$error)
{


$name_tema = "=?utf-8?b?". base64_encode($name) ."?=";

$subject ="Letter from the site Samuele Nubile";
/*
$message ="\n\nСообщение: ".$message."\n\nИмя: " .$name."\n\nТелефон: ".$tel."\n\n";
*/
$message ="\n\nName: ".$name."\n\nEmail: " .$tel."\n\nSubject: " .$sub."\n\nMessage: ".$message."\n\n";
$mail = mail("simone.borelli@live.com", $subject, $message,

"From: ".$name_tema." <".$tel."> "."Reply-To: ".$email." "." X-Mailer: PHP/" . phpversion());


if($mail)
{
echo 'OK';
}

}
else
{
echo '<div class="notification_error">'.$error.'</div>';
}

}

?>
