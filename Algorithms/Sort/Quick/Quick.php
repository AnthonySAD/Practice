<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 2019/5/31
 * Time: 10:39
 */

class Quick
{
    public static function sort1(array $numbers)
    {
        $length = count($numbers);
        $start = 0;
        $end = $length - 1;

        self::sort1_splite($numbers, $start, $end);

        return $numbers;

    }

    private static function sort1_getPoint($numbers, $start, $end)
    {
        return $start;
    }

    private static function sort1_splite(&$numbers, $start, $end)
    {
        if ($start >= $end){
            return;
        }

        $point = self::sort1_getPoint($numbers, $start, $end);

        $mark = $numbers[$point];

        $numbers[$point] = $numbers[$start];

        $rightStart = $start + 1;
        $rightEnd = $end;

        for ($i = $start + 1; $i <= $end; $i ++)
        {
            if ($numbers[$rightStart] > $mark){
                $temp = $numbers[$rightStart];
                $numbers[$rightStart] = $numbers[$rightEnd];
                $numbers[$rightEnd] = $temp;
                $rightEnd --;
            }else{
                $rightStart ++;
            }
        }
        $middle = $rightStart - 1;
        $numbers[$start] = $numbers[$middle];
        $numbers[$middle] = $mark;

        self::sort1_splite($numbers, $start, $middle - 1);
        self::sort1_splite($numbers, $middle + 1, $end);

    }

    private static function echoString(array $arr)
    {
        echo '['.implode(',', $arr).']'.PHP_EOL;
    }

}