<?php
function loadUsersFromXML($xmlFilePath) {
    if (file_exists($xmlFilePath)) {
        $xml = simplexml_load_file($xmlFilePath);
        return $xml;
    } else {
        die("XML file not found.");
    }
}

function saveUsersToXML($users, $xmlFilePath) {
    $users->asXML($xmlFilePath);
}
?>
