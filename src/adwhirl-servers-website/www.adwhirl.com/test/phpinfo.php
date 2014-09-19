<?php

$aa = array("id" =>"   ");

$aa["id"] = trim($aa["id"]);
$cc = array("1"=>"  aa" , "2" => "aa " ,"3" => "  aa  ");
echo "before";
var_dump($cc);

$cc = trim_array($cc);

echo "after";
var_dump($cc);


function trim_array(&$arr){

	foreach($arr as $key =>$value){

		$arr[$key] = trim($value);

	}

	return $arr;
}

?>
