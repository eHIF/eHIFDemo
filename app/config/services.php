<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/
    'mailgun' => array(
        'domain' => 'sandbox7f6ed8fff12d44538dcceca437952b4d.mailgun.org',
        'secret' => 'key-14e8dc98e36985dc1c1fbf829c12022d',
    ),

	'mandrill' => array(
		'secret' => '',
	),

	'stripe' => array(
		'model'  => 'User',
		'secret' => '',
	),

);
