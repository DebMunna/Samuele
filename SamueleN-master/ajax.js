jQuery(document).ready(function($) {

$("#ajax-contact-form").submit(function() {
var str = $(this).serialize();

$.ajax({
type: "POST",
url: "mail.php",
data: str,
success: function(msg) {
if(msg == 'OK') {
result = '<div class="notification_ok">—пасибо, ваше сообщение было отправлено. ќжидайте звонка</div>';
$("#fields").hide();
} else {
result = msg;
}
$('#note').html(result);
}
});
return false;
});
});