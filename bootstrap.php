<?php

Autoloader::add_core_namespace('Sendgrid');

Autoloader::add_classes(array(
	'Sendgrid\\Sendgrid'              => __DIR__.'/classes/sendgrid.php',
	'Sendgrid\\Sendgrid_Mail'         => __DIR__.'/classes/sendgrid/mail.php',
	'Sendgrid\\SendgridException'     => __DIR__.'/classes/sendgrid.php',
	'Sendgrid\\Email_Driver_Sendgrid' => __DIR__.'/classes/email/driver/sendgrid.php',
));
