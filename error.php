<?php

require_once "log.php";

function pageHasError($url){
	$error = getElementByClassName($url,'table','xdebug-error xe-notice');

	showLog('framework/error.php', 'pageHasError', $error);

	return $error <> '';
}

?>