<?php

/*
単純選択ソート
ソート済みでない物の中から最小値を探して、１個ずつ並べていく方法
*/

//0～10の配列を作成。stepは1
$list = range(0, 10 , 1);
//配列をシャッフルする
shuffle($list);

echo "ソートする配列[";
foreach($list as $key) {
	echo $key.", ";
}
echo "]\n";

$listCount = count($list);

for($n = 0; $n < $listCount; $n++) {
    for ($m = $n + 1; $m < $listCount; $m++) {
        if ($list[$m] < $list[$n]) {
            //最小値が変わったらExchange
            $tmp      = $list[$n];
            $list[$n] = $list[$m];
            $list[$m] = $tmp;
        }
    }
}

echo "ソート完了:   [";
foreach ($list as $value) {
    echo $value.", ";
}
echo "]\n";
