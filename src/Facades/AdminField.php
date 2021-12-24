<?php

namespace WebTheory\PostConnection\Facades;

use WebTheory\Leonidas\Fields\Field;

class AdminField extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return Field::class;
    }
}
