<?php

    function secondMax($randInts) : int {
        rsort($randInts);
        return $randInts[1];
    }

    $randInts = [];
    for ($i=0; $i < 5; $i++) { 
        $randInts[] = rand(0, 100);
    }

    var_dump($randInts);
    var_dump(secondMax($randInts));