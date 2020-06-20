<?php

function currentUser()
{
    return auth()->user();
}

function notificationMessage($alertType, $message) {
	return [
		'message' => $message,
        'alert-type' => $alertType
	];
}

function replaceTo1LineBreak($value){
	return str_replace("\r",'', $value);
}