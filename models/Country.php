<?php

namespace models;

use database\core\DB;

class Country
{
	public static function getStatistics()
	{
		$sql = /** @lang SQL */
			'WITH sq AS (
				SELECT Continent,
					   Region,
					   COUNT(*)				AS countries,
					   AVG(LifeExpectancy)	AS life_duration,
					   SUM(Population)		AS population
				  FROM Country
			  GROUP BY Continent,
					   Region
			)
			SELECT Country.Continent,
				   Country.Region,
				   countries,
				   COALESCE(FORMAT(sq.life_duration, 2), \'нет данных\')	AS life_duration,
				   sq.population,
				   COUNT(distinct City.ID)								AS cities,
				   COUNT(distinct langs.CountryCode, langs.Language)		AS langs
			  FROM Country
				   LEFT JOIN City 
				   ON City.CountryCode = Country.Code

				   LEFT JOIN CountryLanguage AS langs 
				   ON Country.Code = langs.CountryCode

				   LEFT JOIN sq 
				   ON sq.Continent = Country.Continent 
					   AND sq.Region = Country.Region

		  GROUP BY Continent,
				   Region
		';

		return DB::run($sql)->fetchAll(\PDO::FETCH_ASSOC);
	}
}