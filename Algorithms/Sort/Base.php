<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 2019/5/22
 * Time: 9:20
 */

class Base
{
    private $numbers;
    public $echoArray;
    public $answer = [];

    public function __construct($total, $min, $max, $echoArray)
    {
        $this->numbers = $this->randomIntArr($total, $min, $max);
        $this->echoArray = $echoArray;
        if ($this->echoArray){
            echo 'The question is: '.PHP_EOL.'['.implode(',', $this->numbers).']'.PHP_EOL;
        }
    }

    public static function sort1($numbers)
    {
        sort($numbers);
        return $numbers;
    }

    public function __get($name)
    {
        $method = explode('_', $name);
        $startTime = microtime(true);
        $ans = call_user_func($method, $this->numbers);
        $endTime = microtime(true);
        $runTime = $endTime - $startTime;
        $ans = $this->arrToString($ans);
        $this->checkAndStoreAnswer($name, $ans);
        echo $this->toString($method, $ans, $runTime);
    }

    private function checkAndStoreAnswer($name, $ans)
    {
        if (!empty($this->answer))
        {
            if ($this->answer[0] !== $ans)
            {
                echo 'Answer of '. $name . ' is different from first answer!'.PHP_EOL;
            }
        }

        $this->answer[] = $ans;
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

    private function arrToString(array $arr)
    {
        return '['.implode(',', $arr).']'.PHP_EOL;
    }

    private function toString($method, $ans, $runTime)
    {
        $str = 'Use the '.$method[1].' method in the '.$method[0].' class,';
        $str .= 'run time is '.$this->toFloat($runTime).' s'.PHP_EOL;
        if ($this->echoArray){
            $str .= 'the answer is: '.PHP_EOL;
            $str .= $ans;
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

