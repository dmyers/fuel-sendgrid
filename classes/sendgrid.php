<?php

namespace Sendgrid;

class Sendgrid
{
	/**
	 * Loaded sendgrid instance.
	 * 
	 * @var Sendgrid
	 */
	protected static $instance;
	
	/**
	 * The API username to use to authenticate.
	 *
	 * @var string
	 */
	protected $username;
	
	/**
	 * The API password to use to authenticate.
	 *
	 * @var string
	 */
	protected $password;
	
	/**
	 * Initialize by loading config.
	 * 
	 * @return void
	 */
	public static function _init()
	{
		\Config::load('sendgrid', true);
	}
	
	public function __construct($username, $password)
	{
		$this->username = $username;
		$this->password = $password;
	}
	
	/**
	 * Returns a new Sendgrid object.
	 *
	 * @return Sendgrid
	 */
	public static function forge()
	{
		$config = \Config::get('sendgrid');
		
		if (empty($config['username'])) {
			throw new \SendgridException('You must set the username config');
		}

		if (empty($config['password'])) {
			throw new \SendgridException('You must set the secret config');
		}
		
		return new static($config['username'], $config['password']);
	}

	/**
	 * Create or return the sendgrid instance.
	 *
	 * @return Sendgrid
	 */
	public static function instance()
	{
		if (self::$instance === null) {
			self::$instance = self::forge();
		}

		return self::$instance;
	}
	
	/**
	 * Sends the email through the web API.
	 *
	 * @param SendGrid_Mail $mail The mail object to send.
	 *
	 * @return mixed
	 */
	public function send($mail)
	{
		$api = new \SendGrid\Web($this->username, $this->password);
		
		return $api->send($mail);
	}
}

class SendgridException extends \FuelException {}
