<?php

namespace App\Service;
use App\Service\Transform;

class Capital implements Transform{

    public function transform(string $inputValue): string
    {
        $string = preg_replace('/(\w)(.)?/e', "strtoupper('$2').strtolower('$1')", $inputValue);
        return $string;
    }

}


