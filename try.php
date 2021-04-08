<?php
function getCAScores(array $CAScore)
{

    $ca = array();
    foreach ($CAScore as $ca) {
        array_push($CAScore, $ca);
    }
    return $ca;

}

$score = array(5, 10, 15);
print_r(getCAScores($score));

?>