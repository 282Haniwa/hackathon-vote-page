<?php
require_once("./config.php");

$items = getParam($_GET["item"]);

if ($items) {
    do {
        $id = uniqid();
        $filename = "{$DATA_DIR}{$id}.{$DATA_TYPE}";
    } while (file_exists($filename));
    $data = [];
    foreach ($items as $key => $value) {
        $data[] = ["id" => $key, "name" => $value, "vote" => 0];
    }
    $json = json_encode($data);
    $result = file_put_contents($filename, $json);
}

function getParam($param)
{
    if (isset($param) && $param != "") {

        return $param;
    }

    return null;
}

?>
