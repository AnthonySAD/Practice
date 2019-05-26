<?php
/**
 * Created by PhpStorm.
 * User: 31272
 * Date: 2019/5/26
 * Time: 20:30
 */

/**
 * Class Merge
 * 经测试当数组大小为10k时,速度比原始冒泡排序快150倍左右,排序100w的数据也只要3s多,如果用原始冒泡排序,我等了10分钟都没排序好
 */
class Merge
{
    public static function sort1(array $numbers)
    {
        $length = count($numbers);
        $start = 0;
        $end = $length - 1;
        self::sort1_split($numbers, $start, $end);
        return $numbers;
    }

    public static function sort1_split(& $numbers, $start, $end)
    {
        if ($end > $start)
        {
            $middle = floor(($start + $end) / 2);
            self::sort1_split($numbers, $start, $middle);
            self::sort1_split($numbers, $middle + 1, $end);
            self::sort1_merge($numbers, $start, $middle, $middle + 1, $end);

        }
    }

    public static function sort1_merge(& $numbers, $leftStart, $leftEnd, $rightStart, $rightEnd)
    {
        $i = $leftStart;
        $j = $rightStart;
        $temp = [];
        while ($i <= $leftEnd && $j <= $rightEnd)
        {
            if ($numbers[$i] <= $numbers[$j])
            {
                $temp[] = $numbers[$i];
                $i ++;
            }else{
                $temp[] = $numbers[$j];
                $j ++;
            }
        }

        if ($i <= $leftEnd)
        {
            for (;$i <= $leftEnd; $i ++)
            {
                $temp[] = $numbers[$i];
            }
        }else{
            for (;$j <= $rightEnd; $j ++)
            {
                $temp[] = $numbers[$j];
            }
        }

        for ($i = 0; $i <= $rightEnd - $leftStart; $i ++)
        {
            $numbers[$i + $leftStart] = $temp[$i];
        }

        unset($temp);
    }

    private static function echoArray($numbers, $start, $end)
    {
        $str = '[';
        for ($i = $start; $i <= $end; $i ++)
        {
            $str .= $numbers[$i];
            if ($i < $end){
                $str .= ',';
            }
        }
        $str .= ']';
        echo $str.PHP_EOL;
    }
}