jQuery(document).ready(function($) {

$("#ajax-contact-form").submit(function() {
var str = $(this).serialize();

$.ajax({
type: "POST",
url: "contact-form.php",
data: str,
success: function(msg) {
if(msg == 'OK') {
result = '<div class="notification_ok">Thank you, your message has been sent.</div>';
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