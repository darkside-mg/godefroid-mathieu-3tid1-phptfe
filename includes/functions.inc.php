<?php
// PAGE FUNCTIONS.INC.PHP

function message_erreur($errors, $input){
	if(count($_POST)>0){
		$message = '';
		if (count($errors[$input])>0){
			foreach($errors[$input] as $e){
				$message = $message . '<li>' . $e . '</li>';
			}
		}
		return '<ul class="error_messages">' . $message . '</ul>';
	}
}
