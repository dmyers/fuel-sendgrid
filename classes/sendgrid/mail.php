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
		$instance->setFrom(\Arr::get($config, 'email'));
		$instance->setFromName(\Arr::get($config, 'name'));
		
		return $instance;
	}
}
