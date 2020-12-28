<?php
namespace Ninja;

class Markdown {
	private $string;

	public function __construct($markDown) {
		$this->string = $markDown;
	}

	public function toHtml() {
		
		$text = htmlspecialchars($this->string, ENT_QUOTES, 'UTF-8');

	
		$text = preg_replace('/__(.+?)__/s', '<strong>$1</strong>', $text);
		$text = preg_replace('/\*\*(.+?)\*\*/s', '<strong>$1</strong>', $text);

		$text = preg_replace('/_([^_]+)_/', '<em>$1</em>', $text);
		$text = preg_replace('/\*([^\*]+)\*/', '<em>$1</em>', $text);

		$text = str_replace("\r\n", "\n", $text);
	
		$text = str_replace("\r", "\n", $text);

		$text = '<p>' . str_replace("\n\n", '</p><p>', $text) . '</p>';

		$text = str_replace("\n", '<br>', $text);

		$text = preg_replace(
		'/\[([^\]]+)]\(([-a-z0-9._~:\/?#@!$&\'()*+,;=%]+)\)/i',
		'<a href="$2">$1</a>', $text);

		return $text;
	}	
}