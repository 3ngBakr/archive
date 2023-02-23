<?php

use Illuminate\Support\Str;

if (!function_exists('getPluralModelName')) {
	function getPluralModelName(string $modelName)
	: string
	{
		return Str::plural($modelName);
	}
}

if (!function_exists('getUpperPluralModelName')) {
	function getUpperPluralModelName(string $modelName)
	: string
	{
		return Str::replace('_', ' ', ucwords(Str::plural($modelName), '_'));
	}
}

if (!function_exists('getUpperModelName')) {
	function getUpperModelName(string $modelName)
	: string
	{
		return Str::replace('_', ' ', ucwords($modelName, '_'));
	}
}