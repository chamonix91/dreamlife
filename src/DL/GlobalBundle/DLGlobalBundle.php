<?php

namespace DL\GlobalBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class DLGlobalBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
