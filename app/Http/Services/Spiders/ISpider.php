<?php

namespace App\Http\Services\Spiders;

interface ISpider
{
	function handle();
	function translate($data);
}