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

        self::sort1_splite($numbers, 0, $length - 1);

        return $numbers;

    }

    public static function sort2(array $numbers)
    {
        $length = count($numbers);

        self::sort2_splite($numbers, 0, $length - 1);

        return $numbers;

    }

    private static function sort1_splite(&$numbers, $start, $end)
    {
        if ($start >= $end){
            return;
        }

        $mark = $numbers[$start];
        $left = $start;
        $right = $end;

        while($left < $right){
            if($numbers[$right] >$mark){
                $right --;
            }elseif($numbers[$left] <= $mark){
                $left ++;
            }else{
                $temp = $numbers[$left];
                $numbers[$left] = $numbers[$right];
                $numbers[$right] = $temp;
            }
        }
        $numbers[$start] = $numbers[$left];
        $numbers[$left] = $mark;

        self::sort1_splite($numbers, $start, $left - 1);
        self::sort1_splite($numbers, $left + 1, $end);

    }

    private static function sort2_splite(&$numbers, $start, $end)
    {
        if ($start >= $end){
            return;
        }

        $mark = $numbers[$start];
        $left = $start;
        $right = $end;

        while($left != $right){
            while($left < $right && $numbers[$right] > $mark){
                $right --;
            }
            while($left < $right && $numbers[$left] <= $mark){
                $left ++;
            }
            
            if($left < $right){
                $temp = $numbers[$left];
                $numbers[$left] = $numbers[$right];
                $numbers[$right] = $temp;
            }
        }
       
        $numbers[$start] = $numbers[$left];
        $numbers[$left] = $mark;
        self::sort1_splite($numbers, $start, $left - 1);
        self::sort1_splite($numbers, $left + 1, $end);

    }

    private static function echoString(array $arr)
    {
        echo '['.implode(',', $arr).']'.PHP_EOL;
    }

}