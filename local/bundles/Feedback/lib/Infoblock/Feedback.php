<?php

// local/bundles/Feedback/lib/Infoblock/Feedback.php
namespace App\Bundle\Feedback\Infoblock;

use TAO\Infoblock;

class Feedback extends Infoblock
{
	public function title()
	{
		return 'Обратная связь';
	}

	public function properties()
	{
		return array(
			'name' => array(
				'NAME' => 'Имя',
				'SORT' => '100',
				'PROPERTY_TYPE' => 'S',
				'IS_REQUIRED' => 'Y',
			),

			'email' => array(
				'NAME' => 'E-Mail',
				'SORT' => '200',
				'PROPERTY_TYPE' => 'S',
			),

            'phone' => [
                'NAME' => 'Телефон',
                'SORT' => '100',
                'PROPERTY_TYPE' => 'S',
            ],

            'chapter' => [
                'NAME' => 'Раздел новостей',
                'SORT' => '100',
                'PROPERTY_TYPE' => 'E',
				'USER_TYPE' => 'EList',
				'LINK_IBLOCK_ID' => '9'
            ],
			
			'text' => array(
				'NAME' => 'Комментарий',
				'SORT' => '600',
				'PROPERTY_TYPE' => 'S',
				'ROW_COUNT' => '5',
			),      
		);
	}
}