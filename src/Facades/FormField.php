<?php

namespace WebTheory\PostConnection\Facades;

use WebTheory\Saveyour\Factories\FieldFactory;

class FormField extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return FieldFactory::class;
    }
}
