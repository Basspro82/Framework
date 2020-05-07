<?php

require_once "log.php";

function pageHasError($url){

	$error = getElementByClassName($url,'table','xdebug-error xe-notice');

	if ($error == '') $error = getElementByClassName($url,'table','xdebug-error xe-warning');

	showLog('framework/error.php', 'pageHasError', $error);

	return $error <> '';
}

?>