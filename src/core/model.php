<?php

namespace Core;

class Model
{
	// метод выборки данных
	public function query($db, $query)
	{	
		$stmt = $db->prepare($query);
		$stmt->execute();
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
}