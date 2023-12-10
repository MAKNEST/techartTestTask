<?php

namespace Core;

class View
{
	/*
	@param string $content_file - виды отображающие контент страниц;
	@param string $template_file - общий для всех страниц шаблон;
	@param array $data - массив, содержащий элементы контента страницы. Обычно заполняется в модели.
	*/
	function generate($content_view, $template_view, $data = null)
	{
		// подключение шаблона
		require_once 'src/views/'.$template_view;
	}
}
