<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 2019/5/22
 * Time: 9:22
 */

class Bubble
{

    public static function sort1(array $numbers)
    {
        $length = count($numbers);

        for ($i = 0; $i < $length; $i++)
        {
            for ($j = 0; $j < $length - 1 - $i; $j++)
            {
                if ($numbers[$j] > $numbers[$j + 1])
                {
                    $temp = $numbers[$j];
                    $numbers[$j] = $numbers[$j + 1];
                    $numbers[$j + 1] = $temp;
                }
            }
        }

        return $numbers;
    }

    //判断某伦次是否已经为有序,则直接返回
    public static function sort2(array $numbers)
    {
        $length = count($numbers);
        $isSorted = false;
        for ($i = 0; $i < $length; $i ++)
        {
            if ($isSorted){
                return $numbers;
            }
            $isSorted = true;
            for ($j = 0; $j < $length - 1 - $i; $j ++)
            {
                if ($numbers[$j] > $numbers[$j + 1])
                {
                    $temp = $numbers[$j + 1];
                    $numbers[$j + 1] = $numbers[$j];
                    $numbers[$j] = $temp;
                    $isSorted = false;
                }
            }
        }

        return $numbers;
    }

    //判断数组的末尾是否已经有序
    public static function sort3(array $numbers)
    {
        $length = count($numbers);
        $isSorted = false;
        $sortedMark = $length - 1;
        $end = $sortedMark;
        for ($i = 0; $i < $end;)
        {
            if ($isSorted){
                return $numbers;
            }
            $isSorted = true;
            for ($j = 0; $j < $end; $j ++)
            {
                if ($numbers[$j] > $numbers[$j + 1])
                {
                    $isSorted = false;
                    $temp = $numbers[$j + 1];
                    $numbers[$j + 1] = $numbers[$j];
                    $numbers[$j] = $temp;
                    $sortedMark = $j;
                }

            }
            $end = $sortedMark;
        }

        return $numbers;
    }
}