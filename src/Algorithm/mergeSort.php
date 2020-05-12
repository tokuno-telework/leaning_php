<?php
/*
マージソート
分割統治法で解く
配列の全要素をマージソートする関数を定義すると
全要素のソートは左半分のソートと右半分のソートをしてこの左と右の要素を比較して並び替えるとできる。
*/

//0～10の配列を作成。stepは1
$list = range(0, 10, 1);
//配列をシャッフルする
shuffle($list);

echo "ソートする配列は[";
foreach ($list as $key) {
	echo $key.", ";
}
echo "]\n";

mergeSort($list, 0, count($list) - 1);

echo "Sorted   [";
foreach($list as $value) {
	echo $value.", ";
}
echo "]\n";

function mergeSort(&$list, $left, $right) {
	if ($left < $right) {
		$center = intval(($left + $right) / 2);
		$p = 0;
		$j = 0;
		$k = $left;
		$tmp = [];

		// sorted a part of front
		mergeSort($list, $left, $center);
		// sorted a part of rear
		mergeSort($list, $center + 1, $right);

		for ($i = $left; $i <= $center; $i++) {
			$tmp[$p++] = $list[$i];
		}
		
		while($i <= $right && $j < $p) {
			if ($tmp[$j] <= $list[$i]) {
				$list[$k] = $tmp[$j];
				$k++;
				$j++;
			} else {
				$list[$k] = $list[$i];
				$k++;
				$i++;
			}
		}

        	// asc sort
		while($j < $p) {
			$list[$k++] = $tmp[$j++];
		}
	}
}	
?>
