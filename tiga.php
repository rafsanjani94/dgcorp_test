<?php

    $trafics = ['merah', 'kuning', 'hijau'];
    $indexTrafic = 0;

    function traficLight() : string {
        global $trafics, $indexTrafic;
        if ($indexTrafic > 2) {
            $indexTrafic = 0;
        }

        $retTrafic = $trafics[$indexTrafic];
        $indexTrafic++;

        return $retTrafic;
    }

    for ($i=0; $i < 8; $i++) { 
        var_dump(traficLight($indexTrafic));
    }