<?php
/**
 * Created by PhpStorm.
 * User: Anthony
 * Date: 2019/5/22
 * Time: 9:22
 */


/**
 * Class Bubble
 * 冒泡排序的时间复杂度为f(O2),哪怕再优化,面对无序度很高的数据时,性能还是非常差
 * 经测试,优化后的冒泡排序(sort5),运行时间减少了20%左右,但数据量多的话,性能还是太差
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

    //双向冒泡排序,也叫做鸡尾酒排序
    public static function sort4(array $numbers)
    {
        $length = count($numbers);
        $halfLength = floor($length / 2);
        for ($i = 0; $i < $halfLength; $i ++)
        {
            $isSorted = true;

            for ($j = $i; $j < $length - 1 - $i; $j ++)
            {
                if ($numbers[$j] > $numbers[$j + 1])
                {
                    $isSorted = false;
                    $temp = $numbers[$j];
                    $numbers[$j] = $numbers[$j + 1];
                    $numbers[$j + 1] = $temp;
                }
            }

            if ($isSorted)
            {
                return $numbers;
            }

            $isSorted = true;

            for ($j = $length - $i - 1; $j > $i; $j --)
            {

                if ($numbers[$j] < $numbers[$j - 1])
                {
                    $isSorted = false;
                    $temp = $numbers[$j];
                    $numbers[$j] = $numbers[$j - 1];
                    $numbers[$j - 1] = $temp;
                }

            }

            if ($isSorted)
            {
                return $numbers;
            }

        }
        return $numbers;
    }

    //优化双向冒泡排序
    public static function sort5(array $numbers)
    {
        $length = count($numbers);
        $halfLength = floor($length / 2);
        $leftSorted = -1;
        $rightSorted = $length;

        while($leftSorted < $rightSorted - 1)
        {
            $tempRightSorted = false;
            for ($i = $leftSorted + 1; $i < $rightSorted - 1; $i ++)
            {
                if ($numbers[$i] > $numbers[$i + 1])
                {
                    $tempRightSorted = $i + 1;
                    $temp = $numbers[$i];
                    $numbers[$i] = $numbers[$i + 1];
                    $numbers[$i + 1] = $temp;
                }
            }
            if ($tempRightSorted === false)
            {
                return $numbers;
            }
            $rightSorted = $tempRightSorted;

            $tempLeftSorted = false;
            for ($i = $rightSorted - 1; $i > $leftSorted + 1; $i --)
            {
                if ($numbers[$i] < $numbers[$i - 1])
                {
                    $tempLeftSorted = $i - 1;
                    $temp = $numbers[$i];
                    $numbers[$i] = $numbers[$i - 1];
                    $numbers[$i - 1] = $temp;
                }
            }
            if ($tempRightSorted === false)
            {
                return $numbers;
            }
            $leftSorted = $tempLeftSorted;
        }

        return $numbers;
    }
}