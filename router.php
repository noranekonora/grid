<?php

// Macの人向け
// ビルトインPHP内のWEBサーバーを使用する場合 & .html上でphpを動かしたい場合に使用
//使う拡張子はすべてここに記入すること

$root_path = "/public_html/";
$request_file = $_SERVER["REQUEST_URI"];

if (preg_match('/\.(?:png|jpg|jpeg|gif|css|js|otf|eot|ttf|woff|woff2|ico)/', $request_file)) {
    return false;
}

if (!preg_match('/\.(?:html|php)$/', $request_file)) {
    $request_file .= '/index.html';
}
else if (preg_match('/\/$/', $request_file)) {
    $request_file .= 'index.html';
}

require_once(__dir__ . $root_path . $request_file);

?>
