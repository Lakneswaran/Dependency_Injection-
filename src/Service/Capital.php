<?php

namespace App\Service;
use App\Service\Transform;

class Capital implements Transform{

    public function transform(string $inputValue): string
    {
        for ($i = 0; $i < strlen($inputValue); $i++) {
            if ($i % 2 != 0) {
                $inputValue[$i] = strtoupper($inputValue[$i]);
            }
        }
        return $inputValue;

         }
    
}   




