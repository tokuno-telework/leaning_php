<?php

/*
マージソート
分割統治法で解く
配列の全要素をマージソートする関数を定義すると
全要素のソートは左半分のソートと右半分のソートをしてこの左と右の要素を比較して並び替えるとできる。
*/

//0～200の配列を作成。stepは1
$list = range(0, 200 , 1);
//配列をシャッフルする
shuffle($list);

echo 'ソートする配列は';
echo '<pre>';
var_dump($list);
echo '</pre>';

$listCount = count($list);

?>