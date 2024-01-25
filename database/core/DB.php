<?php

namespace database\core;

use PDO;
use PDOStatement;


class DB
{
	/** @var PDO */
	private static $pdo = false;

	private static function initConnection(): void
	{
		include __DIR__.'/../dbConfig.php';
		// $dsn='mysql:dbname=testdb;host=127.0.0.1'
		self::$pdo = new PDO(DB_CONNECTION.':'
			.'dbname='.DB_DATABASE
			.';host='.DB_HOST
			.';port='.DB_PORT.
			DB_USERNAME,
			DB_PASSWORD);
	}

	/**
	 * @param $sql
	 * @param array $params
	 * @return false|PDOStatement
	 */
	static function run($sql, array $params = [])
	{
		if(!self::$pdo) self::initConnection();
		$stm = self::$pdo->prepare($sql);
		$stm->execute($params);
		if ($stm->errorCode() !== '00000') {
			throw new \Exception($stm->errorInfo()[2]);
		}

		return $stm;
	}

	static function startTransaction() :void
	{
		self::run('START TRANSACTION');
	}

	static function commitTransaction() :void
	{
		self::run('COMMIT');
	}

	static function rollbackTransaction() :void
	{
		self::run('ROLLBACK');
	}
}