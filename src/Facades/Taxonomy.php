<?php

namespace WebTheory\PostConnection\Facades;

use WebTheory\Leonidas\Taxonomy\Factory;

class Taxonomy extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return Factory::class;
    }
}
