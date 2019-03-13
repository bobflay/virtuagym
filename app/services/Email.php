<?php


class Email
{

	public static function send($to,$subject,$msg)
	{
		$msg = wordwrap($msg,70);
		// send email
		mail($to,$subject,$msg);
	}

}