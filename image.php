<?php

function saveImageFromUrl($url,$imgPath) {
    file_put_contents($imgPath, file_get_contents($url));
}

?>