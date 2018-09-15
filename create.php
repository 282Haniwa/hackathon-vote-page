<?php
require_once("./config.php");

$id = uniqid();
$items = getParam($_GET["item"]);

if ($items) {
    $filename = "{$DATA_DIR}{$id}.{$DATA_TYPE}";
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
