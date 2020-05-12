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

echo "ソートする配列は\n";
var_dump($list);
echo "======================\n";
$result = mergeSort($list, [], 0, count($list));

echo "Sorted\n";
foreach($result as $value) {
	echo "$value\n";
}

function mergeSort($list, $tmp, $left, $right) {
	if ($left < $right) {
		$center = ($left + $right) / 2;
		// sorted a part of front
		mergeSort($list, $tmp, $left, $center);
		// sorted a part of rear
		mergeSort($list, $tmp, $center + 1, $right);

                // array merge
		merge($list, $tmp, $left, $center + 1, $right);
	}
}

function merge($list, $tmp, $left, $mid, $right) {
	$left_end = $mid -1;
	$tmp_pos = $left;
	$num_elements = $right - $left + 1; // the number of factors

	while($left <= $left_end && $mid <= $right) {
		if ($list[$left] <= $list[$mid]) {
			$tmp[$tmp_pos] = $list[$left];
			$tmp_pos++;
			$left++;
		} else {
			$tmp[$tmp_pos] = $list[$mid];
			$tmp_pos++;
			$mid++;
		}
	}

	// left side
	while ($left <= $left_end) {
		$tmp[$tmp_pos] = $list[$left];
		$left++;
		$tmp_pos++;
	}
	// right side
	while ($mid <= $right) {
		$tmp[$tmp_pos] = $list[$mid];
		$mid++;
		$tmp_pos++;
	}
        // asc sort
	for ($i = 0; $i <= $num_elements; $i++) {
		$number[$right] = $tmp[$right];
		$right--;
	}

	return $list;
}	
?>
