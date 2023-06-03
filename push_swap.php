<?php

$quoicoubeh = "";
function sa(&$la, &$quoicoubeh)
{
    if (count($la) > 1) {
        $deh = $la[0];
        $la[0] = $la[1];
        $la[1] = $deh;
        $quoicoubeh .= "sa ";
    }
}

function sb(&$lb, &$quoicoubeh)
{
    if (count($lb) > 1) {
        $deh = $lb[0];
        $lb[0] = $lb[1];
        $lb[1] = $deh;
        $quoicoubeh .=  "sb ";
    }
}

function sc($la, $lb)
{
    sa($la);
    sb($lb);
    echo "sc ";
}

function pa(&$lb, &$la, &$quoicoubeh)
{
    array_push($la, $lb[0]);
    $lb = array_slice($lb, 1);
    $quoicoubeh .=  "pa ";
}
function pb(&$la, &$lb, &$quoicoubeh)
{
    array_push($lb, $la[0]);
    $la = array_slice($la, 1);
    $quoicoubeh .=  "pb ";
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
    // $timestart=microtime(true);

    $lb = [];
    $argv = array_slice($argv, 1);
    $la = $argv;
    $count = count($la);
    $test = 1;
       if ($count === 1) {
        echo "\n";
        return;
    }
    
    for ($i = 0; $i < $count - 1; $i++) {
        if ($la[$i] < $la[$i + 1]) {
            $test = 0;
        } else {
            $test = 1;
            $i = $count +12;
        }
    }
    while ($test === 1) {
        $test = 0;
        // echo "etape 1 ------------------------\n";
        for ($i = 0; $i < $count; $i++) {
            if (isset($la[1]) && $la[1] < $la[0]) {
                sa($la, $quoicoubeh);
                pb($la, $lb, $quoicoubeh);
                $test = 1;
            } else {
                pb($la, $lb, $quoicoubeh);
            }
            // echo "princesse la ";
            // print_r($la);
            // echo "prince lb ";
            // print_r($lb);
            // echo "\n reiteration ---------------------------------\n";
        }
        
        // echo "etape 2 ---------------------- \n";
        for ($j = 0; $j < $count; $j++) {
            if (isset($lb[1]) && $lb[1] < $lb[0]) {
                sb($lb, $quoicoubeh);
                pa($lb, $la, $quoicoubeh);
                $test = 1;
            } else {
                pa($lb, $la, $quoicoubeh);
            }
            // echo "princess la";
            // print_r($la);
            // echo "prince lb ";
            // print_r($lb);
        }
        // echo "\n--------fin----------------\n";
        
    }
    $quoicoubeh = trim($quoicoubeh);
    echo "$quoicoubeh\n";
        // }
    // $resullt = implode(" ", $la);
    // echo $resullt;
    // calculateur de temps de fonction -------------------------------- vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv
    // $timeend=microtime(true);
    // $time=$timeend-$timestart;
    // $page_load_time = number_format($time, 3);
    // echo "$quoicoubeh \n Script execute en " . $page_load_time . " sec";
}
global $randerino;
$randerino = 2000;
GLOBAL $randtotal;
$randtotal = "";
for($i = 0; $i < $randerino; $i++){
    $rand2=rand(-100001, 10000);
    $randtotal .= "$rand2 ";
}
$randtotal = explode(" ", $randtotal);
algoritmaxx($randtotal);
// algoritmaxx($argv);
//  function convert($size) { $unit=array('b','kb','mb','gb','tb','pb'); return @round($size/pow(1024,($i=floor(log($size,1024)))),2).' '.$unit[$i]; } echo convert(memory_get_usage(true));
// echo "\n $randerino unitees a calculer \n";
// echo convert(memory_get_usage());
