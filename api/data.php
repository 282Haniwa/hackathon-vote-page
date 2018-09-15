<?php
require_once("./config.php");

$id = getParam($_GET["id"]);
if (id) {
    $filename = "{$DATA_DIR}{$id}.{$DATA_TYPE}";
    if (file_exists($filename)) {
        $json = file_get_contents($filename);
        $data = json_decode($json);
    } else {
        echo("ERROR!<br>404 Not Found!");
        exit();
    }
} else {
    echo("ERROR!<br>404 Not Found!");
    exit();
}

echo($json);

function getParam($param)
{
    if (isset($param) && $param != "") {

        return $param;
    }

    return null;
}
?>

<a href="/api/vote.php?voted=1">link</a>