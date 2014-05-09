<?php

namespace Sendgrid;

class Sendgrid_Email extends \SendGrid\Mail
{
	/**
	 * Returns a new Sendgrid Email object.
	 *
	 * @return Sendgrid_Email
	 */
	public static function forge()
	{
		$config = \Config::get('sendgrid.from');
		
		$instance = new static();
		$instance->setFrom(\Arr::get($config, 'email'));
		$instance->setFromName(\Arr::get($config, 'name'));
		
		return $instance;
	}
}
