<?php

namespace Tridcatij\Asciitables;

use Illuminate\Support\Facades\Facade;

class AsciitableFacade extends Facade
{
	protected static function getFacadeAccessor()
	{
		return 'asciitable';
	}
}