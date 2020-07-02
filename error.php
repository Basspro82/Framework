<?php

function pageHasError($url){

	$error = getElementByClassName($url,'table','xdebug-error xe-notice');

	if ($error == '') $error = getElementByClassName($url,'table','xdebug-error xe-warning');

	if ($error == '') $error = getElementByClassName($url,'table','xdebug-error xe-uncaught-exception');

	if ($error == '') $error = getElementByClassName($url,'table','xdebug-error xe-fatal-error');

	showLog('framework/error.php', 'pageHasError', $error);

	return $error <> '';
}

?>