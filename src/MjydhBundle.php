<?php

namespace MjydhBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MjydhBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}