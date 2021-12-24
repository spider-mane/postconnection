<?php

namespace WebTheory\PostConnection\Facades;

use Leonidas\Framework\App\Forms\FormRepository;

class Forms extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return FormRepository::class;
    }
}
