<?php

namespace WebTheory\PostConnection\Facades;

use Swift_Mailer;

class SwiftMailer extends _Facade
{
    protected static function _getFacadeAccessor()
    {
        return Swift_Mailer::class;
    }
}
