<?php

/**
 * 冒泡排序
 *
 * @author   ShaoWei Pu <pushaowei0727@gmail.com>
 * @date     2017/6/16
 * @license  MIT
 * -------------------------------------------------------------
 * 思路分析：就是像冒泡一样，每次从数组当中 冒一个最大的数出来。 
 * -------------------------------------------------------------
 * 你可以这样理解：（从小到大排序）存在10个不同大小的气泡，
 * 由底至上的把较少的气泡逐步地向上升，这样经过遍历一次后最小的气泡就会被上升到顶（下标为0）
 * 然后再从底至上地这样升，循环直至十个气泡大小有序。
 * 在冒泡排序中，最重要的思想是两两比较，将两者较少的升上去
 *
 */

// +--------------------------------------------------------------------------
// | 解题方式一：    | 这儿，可能有用的解决方案
// +--------------------------------------------------------------------------

/**
 * BubbleSort
 *
 * @param array $container
 * @return array
 */
function BubbleSort(array $container)
{
    $count = count($container);
    if(!$count){
        return [];
    }
    for ($j = 1; $j < $count; $j++) {
        for ($i = 0; $i < $count - $j; $i++) {
            if ($container[$i] > $container[$i + 1]) {
                $temp = $container[$i];
                $container[$i] = $container[$i + 1];
                $container[$i + 1] = $temp;
            }
        }
    }
    return $container;
}

// +--------------------------------------------------------------------------
// | 方案测试    | php `this.php` || PHPStorm -> 右键 -> Run `this.php`
// +--------------------------------------------------------------------------

var_dump(BubbleSort([4, 21, 41, 2, 53, 1, 213, 31, 21, 423]));

/*
array(10) {
  [0] =>
  int(1)
  [1] =>
  int(2)
  [2] =>
  int(4)
  [3] =>
  int(21)
  [4] =>
  int(21)
  [5] =>
  int(41)
  [6] =>
  int(41)
  [7] =>
  int(53)
  [8] =>
  int(213)
  [9] =>
  int(423)
}
 */








// +--------------------------------------------------------------------------
// | 解题方式 二：   | 这儿，可能有用的解决方案
// +--------------------------------------------------------------------------
https://mp.weixin.qq.com/s/wO11PDZSM5pQ0DfbQjKRQA
<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 2020/2/6
 * Time: 10:22 AM
 */

/*** 冒泡排序 ***/
class BubbleSort
{
    /**
     * 第一个版本(原始版本)：
     */
    public function sortV1($arr)
    {
        if (empty($arr)) {
            return [];
        }

        if (!is_array($arr)) {
            return [];
        }
        $tmp = 0;
        for ($i = 0; $i < count($arr); $i++) {
            for ($j = 0; $j < count($arr) - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                }
            }
        }
        return $arr;
    }

    /**
     *第二个版本：如果我们能判断出数列已经全部是有序的，并且做出标记，剩下的几轮排序就可以不必执行，提早结束工作。
     */
    public function sortV2($arr)
    {
        if (empty($arr)) {
            return [];
        }
        if (!is_array($arr)) {
            return [];
        }
        $tmp = 0;
        for ($i = 0; $i < count($arr); $i++) {
            $isSorted = true;//有序标记，每一轮的初始值是true
            for ($j = 0; $j < count($arr) - $i - 1; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                    //有序元素交换,所以不是有序，标记变化为false
                    $isSorted = false;
                }
            }
            //  这一版代码做了小小的改动，利用布尔变量isSorted作为标记。
            //  如果在本轮排序中，元素有交换，则说明数列无序；如果没有元素交换，说明数列已然有序，直接跳出大循环。
            if ($isSorted) {
                break;
            }
        }
        return $arr;
    }

    /**
     * 第三个版本：
     */
    public function sortV3(array $arr)
    {
        if (empty($arr)) {
            return [];
        }
        if (!is_array($arr)) {
            return [];
        }
        $tmp = 0;
        $lastExchangeIndex = 0;//最后一次交换的位置
        $sortBorder = count($arr) - 1;//无序数列的边界，每次比较只需要比较大道这里为止
        for ($i = 0; $i < count($arr); $i++) {
            $isSorted = true;
            for ($j = 0; $j < $sortBorder; $j++) {
                if ($arr[$j] > $arr[$j + 1]) {
                    $tmp = $arr[$j];
                    $arr[$j] = $arr[$j + 1];
                    $arr[$j + 1] = $tmp;
                    //有元素交换，所以不是有序，标记为false
                    $isSorted = false;
                    //把无序数列的边界更新为最后一次换元素的位置
                    $lastExchangeIndex = $j;
                }
            }
            $sortBorder = $lastExchangeIndex;
            if ($isSorted) {
                break;
            }
        }
        return $arr;
    }
}


$arr = [5, 8, 6, 3, 9, 2, 1, 7];//顺序全部无序

$bubble = new BubbleSort();
//$result = $bubble->sortV1($arr);
//print_r($result);

//$result = $bubble->sortV2($arr);
//print_r($result);

//这个数列的特点是前半部分（3，4，2，1）无序，后半部分（5，6，7，8）升序，并且后半部分的元素已经是数列最大值。
$arr = [3, 4, 2, 1, 5, 6, 7, 8];
$result = $bubble->sortV3($arr);
print_r($result);



Array
(
    [0] => 1
    [1] => 2
    [2] => 3
    [3] => 4
    [4] => 5
    [5] => 6
    [6] => 7
    [7] => 8
)


