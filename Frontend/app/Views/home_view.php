<div class="baseHeader">
	<h1>Turnverein</h1>
</div>

<?php

$session_htmlTitle = session()->get('htmlTitle');
$session_enviornmentEn = session()->get('enviornmentEn');
$session_enviornmentDe = session()->get('enviornmentDe');
$session_u_id = session()->get('u_id');
$session_u_firstName = session()->get('u_firstName');
$session_u_lastName = session()->get('u_lastName');

$session_u_mail = session()->get('u_mail');

$session_u_isLoggedIn = session()->get('u_isLoggedIn');
$session_u_permissions = session()->get('u_permissions');
$session_relevantFieldsForProvregeln = session()->get('relevantFieldsForProvregeln');

// echo $session_u_lastName;
// echo $session_u_firstName;
// echo $session_u_mail;
?>