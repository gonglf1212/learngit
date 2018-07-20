<?php
$arr = array(
    0=>['cat_id'=>'1','cat_name'=>'电子产品','parent_id'=>'0'],
	1=>['cat_id'=>'2','cat_name'=>'手机','parent_id'=>'1'],
	2=>['cat_id'=>'3','cat_name'=>'电脑','parent_id'=>'1'],
	3=>['cat_id'=>'4','cat_name'=>'小米','parent_id'=>'2'],
	4=>['cat_id'=>'5','cat_name'=>'服装','parent_id'=>'0'],
	5=>['cat_id'=>'6','cat_name'=>'裤子','parent_id'=>'5'],
	6=>['cat_id'=>'7','cat_name'=>'a做的修改','parent_id'=>'0'],
);

function getCategory($arr, $pid=0, $level=0){
	static $list = array();
	foreach ($arr as $key => $value) {
		if ($value['parent_id'] == $pid) {//父亲找到一个儿子
			$value['level'] = $level;//给儿子一个等级
			$list[] = $value;
			getCategory($arr, $value['cat_id'], $level+1);//父亲找到儿子，儿子再去找儿子的儿子
		}
	}
	//b觉得这里写得不错
	return $list;
}

print_r(getCategory($arr));


?>