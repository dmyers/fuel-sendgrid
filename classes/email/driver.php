<?php

abstract class Email_Driver extends \Email\Email_Driver
{
	protected $meta = array();
	
	public function meta(array $meta = array())
	{
		$this->meta = $meta;
		
		return $this;
	}
}