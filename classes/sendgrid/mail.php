<?php

namespace Sendgrid;

class Sendgrid_Mail extends \SendGrid\Mail
{
	/**
	 * Returns a new Sendgrid Mail object.
	 *
	 * @return Sendgrid_Mail
	 */
	public static function forge()
	{
		$config = \Config::get('sendgrid.from');
		
		$instance = new static();
		$instance->setFrom($config['email']);
		$instance->setFromName($config['name']);
		
		return $instance;
	}
}
