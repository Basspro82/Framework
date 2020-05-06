<?php

// $element = div, table etc
function getElementByClassName($url,$element,$className){

	$html = file_get_contents($url);
	@$doc = new DOMDocument();
	@$doc->loadHTML($html);
	$xpath = new DomXPath($doc);

	$nodeList = $xpath->query("//" . $element . "[@class='" . $className . "']");
	$node = $nodeList->item(0);
	if (isset($node)){
		return $node->nodeValue;
	}else{
		return '';
	}
}

?>