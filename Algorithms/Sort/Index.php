<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 2019/5/22
 * Time: 9:20
 */

require_once 'BubbleSort/Bubble.php';
$solution = new Solution($argv[1], $argv[2], $argv[3]);

echo $solution->bubble_sort1;
echo $solution->bubble_sort3;

class Solution
{
    private $numbers;
    public $question = '';
    public $printArray = false;

    public function __construct($total, $min, $max)
    {
        $total = $total ? $total : 10;
        $min = $min ? $min : 0;
        $max = $max ? $max : 50;

        if ($total < 2){
            echo 'invalid argument';
            die();
        }

        $this->numbers = $this->randomIntArr($total, $min, $max);
        $this->question = 'The question is: ['.implode(',', $this->numbers).']'.PHP_EOL;
    }

    public function __get($name)
    {
        $method = explode('_', $name);
        $startTime = microtime(true);
        $ans = call_user_func($method, $this->numbers);
        $endTime = microtime(true);
        $runTime = $endTime - $startTime;

        return $this->toString($method, $ans, $runTime);
    }

    private function randomIntArr($total, $min, $max)
    {
        $numbers = [];
        for ($i = 0; $i < $total; $i++)
        {
            $numbers[$i] = rand($min, $max);
        }

        return $numbers;
    }

    private function toString($method, $ans, $runTime)
    {
        $str = 'Use the '.$method[1].' method in the '.$method[0].' class,';
        $str .= 'run time is '.$this->toFloat($runTime).' s'.PHP_EOL;
        if ($this->printArray){
            $str .= 'the answer is: '.PHP_EOL;
            $str .= '['.implode(',', $ans).']'.PHP_EOL;
        }

        return $str;
    }

    private function toFloat($num, $double = 10)
    {
        if (false !== stripos((string)$num, "E")) {
            $a = explode("e", strtolower((string)$num));
            return bcmul($a[0], bcpow((string)10, (string)$a[1], $double), $double);
        }else{
            return $num;
        }
    }

}

