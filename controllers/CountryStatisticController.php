<?php

namespace controllers;

use models\Country;

class CountryStatisticController
{
	public function index()
	{
		include '../views/countryStatistic.php';
	}

	public function getStatistic()
	{
		$data = Country::getStatistics();
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($data);
	}
}