<?php

function sendMail($from,$to,$subject,$message) {
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
}

?>