<?php

/**
 *  选择排序
 *
 * @author   ShaoWei Pu <pushaowei0727@gmail.com>
 * @date     2017/6/17
 * @license  MIT
 * -------------------------------------------------------------
 * 思路分析：选择排序是不稳定的排序方法
 * 大O表示： O(n 2)
 * -------------------------------------------------------------
 * 它的工作原理是每一次从待排序的数据元素中选出最小（或最大）的一个元素，存放在序列的起始位置，直到全部待排序的数据元素排完。
 * 选择排序是不稳定的排序方法（比如序列[5， 5， 3]第一次就将第一个[5]与[3]交换，导致第一个5挪动到第二个5后面）。
 */


// +--------------------------------------------------------------------------
// | 解题方式
// +--------------------------------------------------------------------------
/**
 * SelectSort
 *
 * @param array $container
 * @return array
 */
function SelectSort(array $container)
{
    $count = count($container);
    for ($i = 0; $i < $count; $i++){
        $k = $i;
        for ($j = $i + 1; $j < $count; $j++){
            if($container[$j] < $container[$k]){
                $k = $j;
            }
        }
        if($k != $i){
            $temp          = $container[$i];
            $container[$i] = $container[$k];
            $container[$k] = $temp;
        }
    }
    return $container;
}

// +--------------------------------------------------------------------------
// | 方案测试
// +--------------------------------------------------------------------------


var_dump(SelectSort([3, 12, 42, 1, 24, 5, 346, 7]));

/*
 array(8) {
  [0] =>
  int(1)
  [1] =>
  int(3)
  [2] =>
  int(5)
  [3] =>
  int(7)
  [4] =>
  int(12)
  [5] =>
  int(24)
  [6] =>
  int(42)
  [7] =>
  int(346)
}
 */


/**====================================================**/



/**
 * 区别于冒泡排序：选择排序存在一个明显问题就是它的不稳定性（当数列包含多个相等的元素时，选择排序有可能打乱他们的原有顺序）
 */

function selectionSort(array $arr = [])
{
    if (empty($arr)) {
        return [];
    }
    if (!is_array($arr)) {
        return [];
    }

    for ($i = 0; $i < count($arr) - 1; $i++) {
        $minIndex = $i;
        for ($j = $i + 1; $j < count($arr); $j++){
            $minIndex = $arr[$minIndex] < $arr[$j] ? $minIndex : $j;
        }
        $temp = $arr[$i];
        $arr[$i] = $arr[$maxIndex];
        $arr[$minIndex] = $temp;
    }

    return $arr;
}


$arr = [3, 4, 2, 1, 5, 6, 7, 8, 30, 50, 1,33, 24, 5,-4, 7, 0];
$result = selectionSort($arr);
print_r($result);exit;




