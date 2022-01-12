<?php

namespace App\Service;
use App\Service\Transform;

class Change implements Transform{

    public function transform(string $inputValue): string
    {
        $string = str_replace(" ", "-",  $inputValue);
        return $string;
    }

}