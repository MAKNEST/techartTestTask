<?
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
	die();
?>
<footer>
	<div class="container"> 
		<?= \TAO::frontend()->renderBlock(
			'common/footer',
			[
				'title' => '© 2023 — 2412 «Галактический вестник»'
			]
		) ?>
	</div>
</footer>
</body>
</html>