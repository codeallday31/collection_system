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
