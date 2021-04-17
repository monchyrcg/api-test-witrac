<?php
declare(strict_types=1);

namespace Src\Shared\Domain;

interface Domain
{
    public function toArray() : array;
}
