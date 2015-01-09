<?php

return array(
	// Stripe keys - DEV ONLY - will need to be changed in production!
	'stripe' => array(
	    'secret'     	=> $_ENV['secret'],
	    'public' 		=> $_ENV['public']
	)
);