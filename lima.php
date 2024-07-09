<?php

    function maxCharSimilar(string $str) : array {
        $charCount = [];
        for ($i=0; $i < strlen($str); $i++) {
            if (array_key_exists($str[$i], $charCount)) {
                $charCount[$str[$i]]++;
            } else {
                $charCount[$str[$i]] = 1;
            }
        }

        arsort($charCount);

        return [
            'char' => array_key_first($charCount),
            'count' => $charCount[array_key_first($charCount)].'x',
        ];
    }

    var_dump(maxCharSimilar('strawberry'));