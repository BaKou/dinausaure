<?php

function checkParam($size,$tab)
{
    if ($size > 100000 || $size < 1) {
        return true;
    }

    if (count($tab) > 100000) {
        return true;
    }

    if (count($tab) !== $size) {
        return true;
    }

    for ($i = 0; $i < $size; $i++) {
        $m = (int)$tab[$i];
        if ($m < 0 || $m > 100000){
            return true;
        }
    }

    return false;
}

function paravent($continentLength, $mountains)
{

    $count = 0;
    $tabMountain = explode(" ", trim($mountains));
    $continentLength = (int)$continentLength;

    if(checkParam($continentLength,$tabMountain)){
        return 'error with params';
    }

    $actualHigherMountain = 0;

    for ($i = 0; $i < $continentLength; $i++) {

        $tabMountain[$i] = (int)$tabMountain[$i];

        if ($actualHigherMountain > $tabMountain[$i]){
            $count++;
        } else{
            $actualHigherMountain = $tabMountain[$i];
        }
    }

    return $count;
}

