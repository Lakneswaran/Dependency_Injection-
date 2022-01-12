<?php

namespace App\Service;
use App\Service\Transform;

class Capital implements Transform{

    public function transform(string $inputValue): string
    {
        $pattern = '/(\w+) (\d+), (\d+)/i';
        $replacement = strtolower('$1').strtoupper('$2');
        $string = preg_replace($pattern, $replacement, $inputValue);
        // $string = preg_replace_callback('/(\w)(.)?/e', "strtolower('$1').strtoupper('$2')", $inputValue);
        return $string;
    }

}


