<?php

if($_POST)
    {
    $to = "manshilina.a@ukr.net"; //куда отправлять письмо
    $from = 'With page booking Samuele Nubile'; // от кого
    $subject = "Booking Samuele Nubile"; //тема
    $message = '<span style="font-weight:bold;color:#ff6600;font-size:18px;"><i>With page booking Samuele Nubile</i> </span><br><br>
	
    Name: <span style="font-weight:bold;color:#0000;">'.$_POST['name'].'</span><br>
    Surname: <span style="font-weight:bold;color:#0000;"> '.$_POST['surname'].'</span><br>
	Email: <span style="font-weight:bold;color:#0000;"> '.$_POST['email'].'</span><br>
	Phone: <span style="font-weight:bold;color:#0000;"> '.$_POST['phone'].'</span><br>
	Day: <span style="font-weight:bold;color:#0000;"> '.$_POST['item_number'].'</span><br>
	Month: <span style="font-weight:bold;color:#0000;"> '.$_POST['item_month'].'</span><br>
	Year: <span style="font-weight:bold;color:#0000;"> '.$_POST['item_year'].'</span><br>
	From: <span style="font-weight:bold;color:#0000;"> '.$_POST['item_from'].'</span><br>
	To: <span style="font-weight:bold;color:#0000;"> '.$_POST['item_to'].'</span><br>
	Event: <span style="font-weight:bold;color:#0000;"> '.$_POST['eventus'].'</span><br>
	State: <span style="font-weight:bold;color:#0000;"> '.$_POST['state'].'</span><br>
	Adress: <span style="font-weight:bold;color:#0000;"> '.$_POST['adress'].'</span><br>
	Description: <span style="font-weight:bold;color:#0000;"> '.$_POST['description'].'</span><br>
	Request: <span style="font-weight:bold;color:#0000;"> '.$_POST['request'].'</span>';
    $headers = "Content-type: text/html; charset=UTF-8 \r\n";
    $headers .= "From: Samuele Nubile\r\n";
    $result = mail($to, $subject, $message, $headers);
 
    if ($result){
        echo "<p>Thank you! The message was successfully sent.</p>";
    }
	
    }
	
?>