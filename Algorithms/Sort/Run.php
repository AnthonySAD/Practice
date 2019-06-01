<?php

require_once 'Base.php';
require_once 'Bubble/Bubble.php';
require_once 'Insertion/Insertion.php';
require_once 'Selection/Selection.php';
require_once 'Merge/Merge.php';
require_once 'Quick/Quick.php';


$total = isset($argv[1]) ? $argv[1] : 10;
$min = isset($argv[2]) ? $argv[2] : 0;
$max = isset($argv[3]) ? $argv[3] : 50;

$echoArray = false;
$solution = new Base($total, $min, $max, $echoArray);

$solution->Base_sort1;
//$solution->Bubble_sort1;
//$solution->Bubble_sort4;
//$solution->Bubble_sort5;
//$solution->Insertion_sort1;
//$solution->Selection_sort1;
$solution->Merge_sort1;
//$solution->Quick_sort1;
//$solution->Quick_sort2;