<?php

namespace App\Bundle\Feedback\Form;

class Feedback extends \TAO\Form
{
	public function options()
	{
		return array(
			'infoblock' => 'feedback',
			'layout' => 'feedback',
			'show_labels' => false,
			'show_placeholders' => true,
			'submit_text' => 'Оставить сообщение',
			'title' => 'Обратная связь'
		);
	}
	
	public function required()
	{
		return [
			'name' => 'Введите ваше имя',
			'email' => 'Введите ваше E-mail',
			'phone' => 'Введите ваше телефон',
			'chapter' => 'Выберете категорию',
			'text' => 'Введите сообщение',
		];
	}

	public function useStyles()
    {
        $this->bundle->useStyle('form_feedback.css');
    }
}