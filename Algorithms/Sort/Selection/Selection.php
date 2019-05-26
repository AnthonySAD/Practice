<?php
/**
 * Created by PhpStorm.
 * User: 31272
 * Date: 2019/5/26
 * Time: 17:33
 */


/**
 * Class Selection
 * 经测试选择排序的性能和插入排序相似,但是选择排序却不是原地排序,实用性非常低
 */
class Selection
{
    public static function sort1(array $numbers)
    {
        $length = count($numbers);

        for ($i = 0; $i < $length; $i ++)
        {
            $index = $i;
            $temp = $numbers[$i];
            for ($j = $i + 1; $j < $length; $j ++)
            {
                if ($temp > $numbers[$j])
                {
                    $index = $j;
                    $temp = $numbers[$j];
                }
            }

            $numbers[$index] = $numbers[$i];
            $numbers[$i] = $temp;
        }

        return $numbers;
    }
}