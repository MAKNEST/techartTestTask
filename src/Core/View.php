<?php

namespace Core;

class View
{
	/*
	@param string $content_file - контент страниц;
	@param string $template_file - шаблон страницы
	@param array $data - массив, содержащий элементы контента страницы.
	*/
	function generate($content_view, $template_view, $data = null)
	{
		// подключение шаблона
		require_once 'src/views/'.$template_view;
	}
}
