<?php

if ( isset( $_POST['checkemail'] ) ) {
	
	// Get email
	$email = $_POST['email'];
	
	// Check if email existst. Here you can do whatever you want, for example check in a database if the email i unique.
	if ( $email != 'test@test.com' ) echo 'success';
	else echo 'The email already exists. Try another one.';
}

?>