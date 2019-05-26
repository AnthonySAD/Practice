<?php
/**
 * Created by PhpStorm.
 * User: 31272
 * Date: 2019/5/26
 * Time: 16:35
 */


/**
 * Class Insertion
 * 插入排序代码简单,但性能却比最原始的冒泡排序提高了3倍。
 * 插入排序的难点是如何交换元素位置。
 * 时间复杂度分析:插入算法的时间复杂度也是f(o2),执行次数比优化后的冒泡排序略微减少,但是插入排序的赋值操作只有1次,而冒泡需要3次,所以性能大约提高了3倍.
 */
class Insertion
{
    public static function sort1(array $numbers)
    {
        $length = count($numbers);

        for ($i = 1; $i < $length; $i ++)
        {
            $temp = $numbers[$i];
            for ($j = $i - 1; $j >= 0; $j --)
            {
                if ($temp < $numbers[$j])
                {
                    $numbers[$j + 1] = $numbers[$j];
                }else{
                    break;
                }
            }

            $numbers[$j + 1] = $temp;

        }

        return $numbers;
    }
}