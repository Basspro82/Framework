<?php

function GetHostUrl(){

	return (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

}

function GetCurrentUrl()
{	
	return GetHostUrl . $_SERVER[REQUEST_URI];
}

?>