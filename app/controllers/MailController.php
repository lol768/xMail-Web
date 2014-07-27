<?php
class MailController extends BaseController {

	public function getMailbox(){
		return View::make('mailbox');
	}
}
