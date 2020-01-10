<?php

namespace App\Http\Services\Spiders;

class SpiderFactory
{	
	private $spiderMap = [
		'ahk3' => Ahk3Spider::class
	];

	public function handle($type)
	{
		if (!isset($this->spiderMap[$type])) {
			return null;
		}

		$spider = app($this->spiderMap[$type]);
		return $spider->handle();
	}
}