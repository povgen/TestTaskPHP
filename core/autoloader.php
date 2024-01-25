<?php
spl_autoload_register(function (string $class) {
	$pathToFile = __DIR__."/../{$class}.php";
	if (is_readable($pathToFile)) {
		require $pathToFile;
	}
});