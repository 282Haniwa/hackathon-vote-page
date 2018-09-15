<?php
require_once("./config.php");

$id = getParam($_GET["id"]);
if (id) {
    $filename = "{$DATA_DIR}{$id}.{$DATA_TYPE}";
    if (file_exists($filename)) {
        if (unlink($filename)){
            echo $filename.'の削除に成功しました。';
          }else{
            echo $filename.'の削除に失敗しました。';
          }
    } else {
        echo("ERROR!<br>404 Not Found!");
        exit();
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

<a href="/vote.php?voted=1">link</a>