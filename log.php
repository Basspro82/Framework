<?php

function showLog($fileName,$functionName,$object){

	global $showLog;

	if ($showLog){
		echo '<h3>' . $fileName . '/' . $functionName . '()</h3>';
		echo '<pre>';
		var_dump($object);
		echo '</pre>';
		echo '<hr/>';
	}

}

?>