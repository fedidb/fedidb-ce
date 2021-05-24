<?php

return [
	'bin_expire_hours' => env('BIN_EXPIRE_HOURS', 2),
    'max_bins' => env('MAX_BINS', 20),
    'limit_ip' => env('LIMIT_IP', true),
    'app_domain' => env('APP_DOMAIN', 'app.fedidb.org')
];
