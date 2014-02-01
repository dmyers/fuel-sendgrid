<?php

namespace Sendgrid;

class Email_Driver_Sendgrid extends \Email_Driver
{
	protected $meta = array();
	
	public function meta(array $meta = array())
	{
		$this->meta = $meta;
	}
	
	protected function _send()
	{
		$sendgrid = \Sendgrid::instance();
		
		$mail = \Sendgrid_Mail::forge();
		
		$from = $this->get_from();
		$from_name = \Arr::get($from, 'name');
		$from_email = \Arr::get($from, 'email');
		
		$reply_to = $this->get_reply_to();
		
		foreach ($reply_to as $key => $reply_to) {
			$mail->setReplyTo(\Arr::get($reply_to, 'email'));
		}
		
		$to = $this->get_to();
		
		foreach ($to as $key => $to) {
			$mail->addTo(\Arr::get($to, 'email'), \Arr::get($to, 'name'));
		}
		
		$cc = $this->get_cc();
		
		foreach ($cc as $key => $cc) {
			$mail->addCc(\Arr::get($cc, 'email'));
		}
		
		$bcc = $this->get_bcc();
		
		foreach ($bcc as $key => $bcc) {
			$mail->addBcc(\Arr::get($bcc, 'email'));
		}
		
		$config = \Config::get('sendgrid.from');
		
		if (!empty($from_name) && !empty($from_email)) {
			$mail->setFromName($from_name);
			$mail->setFrom($from_email);
		}
		
		foreach ($this->meta as $key => $value) {
			$mail->addUniqueArgument($key, $value);
		}
		
		$subject = $this->get_subject();
		$mail->setSubject($subject);
		
		$body = $this->get_body();
		
		if ($this->type == 'plain') {
			$mail->setText($body);
		}
		else {
			$mail->setHtml($body);
		}
		
		return $sendgrid->send($mail);
	}
}
