<?php
$str = "456456";
$prod_qty = '5454';
//$pattern_name = '/\d/';
$pattern_qty = '/[a-z]/';
echo "<form action = '' method='get'>
       <input type = 'text' name = 'prod_name'>
       <input type = 'number' name = 'prod_qty'>
       <input type = 'submit' name = 'submit' value='submit'><br>

";
function valid($pat,$name){
	$pat = str_replace('prod', '$pattern', $name);
	if(preg_match($pat,$pr_name.'$name')) {
		echo preg_match($pat,$pr_name);
	}
}
foreach($_REQUEST as $key=>$val) {
	echo '$'.$key.", $".$val."<br>";
    
}
//valid($pattern_qty,$str);
//echo preg_match($pattern_qty,$prod_qty);
