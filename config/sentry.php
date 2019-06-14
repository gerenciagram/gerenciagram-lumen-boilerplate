<?php

return array(
	'dsn' => env('SENTRY_LARAVEL_DSN', 'https://042d536ee2904338b8dcfd0100c5a869@sentry.io/1459520'),

    // capture release as git sha
    	'release' => trim(exec('git log --pretty="%h" -n1 HEAD')),
);
