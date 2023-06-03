<?php

function sa(&$la)
{
    if (count($la) > 1) {
        $deh = $la[0];
        $la[0] = $la[1];
        $la[1] = $deh;
        echo "sa ";
    }
}

function sb(&$lb)
{
    if (count($lb) > 1) {
        $deh = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $deh;
        echo "sb ";
    }
}

function sc($la, $lb)
{
    sa($la);
    sb($lb);
    echo "sc ";
}

function pa(&$lb, &$la)
{
    array_push($la, $lb[0]);
    $lb = array_slice($lb, 1);
    echo "pa ";
}
function pb(&$la, &$lb)
{
    array_push($lb, $la[0]);
    $la = array_slice($la, 1);
    echo "pb ";
}

function ra($la)
{
    array_push($la, $la[0]);
    $la = array_slice($la, 1);
    echo "ra ";
}
function rb($lb)
{
    array_push($lb, $lb[0]);
    $lb = array_slice($lb, 1);
    echo "rb ";
}

function rr($la, $lb)
{
    rb($lb);
    ra($la);
}

function rra($la)
{
    array_unshift($la, $la[array_key_last($la)]);
    array_pop($la);
    echo "rra ";
}

function rrb($lb)
{
    array_unshift($lb, $lb[array_key_last($lb)]);
    array_pop($lb);
    echo "rrb ";
}

function rrr($la, $lb)
{
    rra($lb);
    rrb($la);
}


function algoritmaxx($argv)
{
    $lb = [];
    $argv = array_slice($argv, 1);
    $la = $argv;
    $count = count($la);
    $test = 1;
    if ($count === 1) {
        $la = str_split($la[0]);
    }
    $count = count($la);
    if ($count === 1) {
        goto b;
    }
    
    for ($i = 0; $i < $count - 1; $i++) {
        if ($la[$i] < $la[$i + 1]) {
            $test = 0;
        } else {
            $test = 1;
            goto a;
        }
    }
    a:
    while ($test === 1) {
        // if ($count > 1){
        // $count = $count;
        // }
        $test = 0;
        // echo "étape 1 ------------------------\n";
        for ($i = 0; $i < $count; $i++) {
            if (isset($la[1]) && $la[1] < $la[0]) {
                sa($la);
                pb($la, $lb);
                $test = 1;
            } else {
                pb($la, $lb);
            }
            // echo "princesse la ";
            // print_r($la);
            // echo "prince lb ";
            // print_r($lb);
            // echo "\n reiteration ---------------------------------\n";
        }
        // echo "étape 2 ---------------------- \n";
        for ($j = 0; $j < $count; $j++) {
            if (isset($lb[1]) && $lb[1] < $lb[0]) {
                sb($lb);
                pa($lb, $la);
                $test = 1;
            } else {
                pa($lb, $la);
            }
            // echo "princesse la ";
            // print_r($la);
            // echo "prince lb ";
            // print_r($lb);
        }
        // echo "\n--------fin----------------\n";
    }
    // echo "\n";
    b:
}

algoritmaxx($argv);


// function algoritmaxx($argv)
// {
//     $lb = [];
//     $argv = array_slice($argv, 1);
//     $la = $argv;

//     $count = count($la)-1;
//     $test = 1;
//     while ($test === 1) {
//         if ($count > 1){
//             $count = $count-1;
//         }
//         $test = 0;
//         for ($i = 0; $i < $count; $i++) {
//             if ($la[$i + 1] < $la[$i]) {
//                 sa($la);
//                  pb($la, $lb);
//                 $test = 1;
//             } 
//             else if($la[$i + 1] > $la[$i])
//             {
//                  pb($la,$lb);
//             }
//         }
//          for($j = 0; $j < $count; $j++){
//             if ($lb[$i + 1] < $lb[$i]) {
//                 sb($lb);
//                 pa($lb, $la);
//                 $test = 1;
//             } 
//             else if($lb[$i + 1] > $lb[$i])
//             {
//                  pa($lb,$la);
//             }
// }
        
        
//     }
//     echo "princesse la ";
//     print_r($la);
//     echo "prince lb ";
//     print_r($lb);
// }