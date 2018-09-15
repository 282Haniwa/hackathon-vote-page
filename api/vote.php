<?php
require_once("./config.php");

$prev_url = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_QUERY);
parse_str($prev_url);
$voted = getParam($_GET["voted"]);

if (id) {
    $filename = "{$DATA_DIR}{$id}.{$DATA_TYPE}";
    if (!file_exists($filename)) {
        echo("ERROR!<br>404 Not Found!");
        exit();
    }
    $json = file_get_contents($filename);
    $data = json_decode($json, true);
    $voted_data_index = array_search($voted, array_column($data["items"], "id"));
    $data["items"][$voted_data_index]["vote"] = intval($data["items"][$voted_data_index]["vote"]) + 1;
    $json = json_encode($data);
    $result = file_put_contents($filename, $json);
    if ($result) {
        # 結果ページへリダイレクト
    } else {
        echo("ERROR!");
    }
} else {
    echo("ERROR!<br>404 Not Found!");
    exit();
}

function getParam($param)
{
    if (isset($param) && $param != "") {

        return $param;
    }

    return null;
}

?>