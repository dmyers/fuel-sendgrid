<?php

Autoloader::add_core_namespace('Sendgrid');

Autoloader::add_classes(array(
	'Sendgrid\\Sendgrid'              => __DIR__.'/classes/sendgrid.php',
	'Sendgrid\\Sendgrid_Email'        => __DIR__.'/classes/sendgrid/email.php',
	'Sendgrid\\SendgridException'     => __DIR__.'/classes/sendgrid.php',
	'Sendgrid\\Email_Driver_Sendgrid' => __DIR__.'/classes/email/driver/sendgrid.php',
	'Email_Driver'                    => __DIR__.'/classes/email/driver.php',
));
