<?php

namespace Sendgrid;

class Email_Driver_Sendgrid extends \Email_Driver
{
	protected function _send()
	{
		$sendgrid = \Sendgrid::instance();
		
		$email = \Sendgrid_Email::forge();
		
		$from = $this->get_from();
		$from_name = \Arr::get($from, 'name');
		$from_email = \Arr::get($from, 'email');
		
		$reply_to = $this->get_reply_to();
		
		foreach ($reply_to as $key => $reply_to) {
			$email->setReplyTo(\Arr::get($reply_to, 'email'));
		}
		
		$to = $this->get_to();
		
		foreach ($to as $key => $to) {
			$email->addTo(\Arr::get($to, 'email'), \Arr::get($to, 'name'));
		}
		
		$cc = $this->get_cc();
		
		foreach ($cc as $key => $cc) {
			$email->addCc(\Arr::get($cc, 'email'));
		}
		
		$bcc = $this->get_bcc();
		
		foreach ($bcc as $key => $bcc) {
			$email->addBcc(\Arr::get($bcc, 'email'));
		}
		
		$config = \Config::get('sendgrid.from');
		
		if (!empty($from_name) && !empty($from_email)) {
			$email->setFromName($from_name);
			$email->setFrom($from_email);
		}
		
		foreach ($this->meta as $key => $value) {
			$email->addUniqueArgument($key, $value);
		}
		
		$subject = $this->get_subject();
		$email->setSubject($subject);
		
		$body = $this->get_body();
		
		if ($this->type == 'plain') {
			$email->setText($body);
		}
		else {
			$email->setHtml($body);
		}
		
		return $sendgrid->send($email);
	}
}
