<?php
require 'core/autoloader.php';

use database\core\DB;

$commands = [
    'loadDump' => function ($argv) {

	    $dump = file_get_contents('database/dumps/world.sql');

		if (!$dump) {
			throw new Exception('dump of world.sql not found');
		}
	    foreach (explode(';', $dump) as $command) {
			if (trim($command)) {
				DB::run($command);
			}
	    }

		echo 'dump loaded success';
    },
];

$commands['help'] = function ($argv) use ($commands) {
    echo "available commands:\n - " . implode("\n - ", array_keys($commands));
};


if (!$argv[1]) {
    echo 'Please enter some command or try \'help\'';
} elseif (array_key_exists($argv[1], $commands)) {
	try {
		call_user_func($commands[$argv[1]], $argv);
	} catch (Exception $exception) {
		echo "error:\n {$exception->getMessage()}";
	}
} else {
    echo 'unknown command:';
    var_dump($argv[1]);
    echo 'try \'help\'';
}


