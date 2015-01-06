<?php

return array(
	// Stripe keys - DEV ONLY - will need to be changed in production!
	$stripe = array(
	  "secret_key"      => $_ENV['secret_key'],
	  "publishable_key" => $_ENV['publishable_key']
	);
);