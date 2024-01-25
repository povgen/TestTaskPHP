<?php

namespace models;

use database\core\DB;

class Country
{
	public static function getStatistics()
	{
		return DB::run('
			SELECT Continent,
			       Region,
			       count(*)                          				AS contries,
			       coalesce(AVG(LifeExpectancy), \'\') 				AS LifeDurartion,
			       SUM(Population)                   				AS Population,
			       SUM(sq.cities)                    				AS cities,
			       SUM(sq.langs)                     				AS langs
			  FROM (SELECT Continent,
			               Region,
			               LifeExpectancy,
			               Population,
			               (SELECT COUNT(*)
			                  FROM CountryLanguage
			                 WHERE CountryCode = Country.Code
			               )                           				AS langs,
			               (SELECT COUNT(*) 
			                  FROM City 
			                 WHERE CountryCode = Country.Code
			               ) 										AS cities
			          FROM Country) as sq
		  GROUP BY sq.Continent, 
		           sq.Region
		  
		  ORDER BY sq.Continent, 
		           sq.Region;
			
			
		')->fetchAll(\PDO::FETCH_ASSOC);
	}
}