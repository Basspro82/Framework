<?php

function getElementByClassName($url,$className){

	$html = file_get_contents($url);
	@$doc = new DOMDocument();
	@$doc->loadHTML($html);
	$xpath = new DomXPath($doc);

	$nodeList = $xpath->query("//div[@class='" . $className . "']");
	$node = $nodeList->item(0);
	return $node->nodeValue;
}

?>