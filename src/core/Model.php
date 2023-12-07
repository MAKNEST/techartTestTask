<?php

class Model
{
	// 
	/**
	 * метод выборки данных
	 * @param object $db объект БД
	 * @param string $query SQL запрос
	 * @param array $params массив параметров для выборки
	 * @return mixed данные из БД
	 */ 
	public function query($db, $query, $params)
	{	
		try {
			$stmt = $db->prepare($query);

			foreach ($params as $value) {
				$stmt->bindvalue($value['param'], $value['value'], $value['param_type']);
			}

			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}
}