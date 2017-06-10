<?
 if($_SERVER["REQUEST_METHOD"] == "POST")
{
 // Функция отправки email
 function send_mail($from,$to,$subject,$body)
{
	$charset = 'utf-8';
	mb_language("ru");
	$headers  = "MIME-Version: 1.0 \n" ;
	$headers .= "From: <".$from."> \n";
	$headers .= "Reply-To: <".$from."> \n";
	$headers .= "Content-Type: text/html; charset=$charset \n";
	
	$subject = '=?'.$charset.'?B?'.base64_encode($subject).'?=';

	mail($to,$subject,$body,$headers);
} 


session_start();    
    
$name = $_POST["feedback_name"];
$email = $_POST["feedback_email"];
$subject = $_POST["feedback_subject"];
$txt = $_POST["feedback_txt"];
$key = $_POST["feedback_key"];

$error = array();

if (strlen($name) == 0){ $error[] = "Укажите своё имя!"; }
if (!preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i",trim($email))){ $error[] = "Укажите корректный email!"; }
if (strlen($subject) == 0){ $error[] = "Укажите тему сообщения!"; }
if (strlen($txt) == 0){ $error[] = "Напишите сообщение!"; }
if ($key != $_SESSION['result_key']){ $error[] = "Не верный код проверки!"; }


 
if (count($error))
{
    echo implode('<br />',$error);
}else
{
    unset($_SESSION['result_key']);
    // Отправка email
    send_mail( $email,
               'arturlt@yandex.ru',
               $subject,
               'От - '.$name.'<br/><br/>'.$txt);
               
    echo 'true'; 
}

}    
?>