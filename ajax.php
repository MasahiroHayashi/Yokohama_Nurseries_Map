<?php

//$param = array('query' => htmlspecialchars($_POST['data']));
$param = array('query' => $_POST['data']);
$param = http_build_query($param, "", "&");

$header  = array(
    // "User-Agent: 任意のユーザーエージェント",
    "Content-Type: application/x-www-form-urlencoded",
    "Accept: application/sparql-results+json",
    "Content-Length: ".strlen($param)
);
$context = array(
    "http" => array(
        "method"  => "POST",
        "header"  => implode("\r\n", $header),
        "content" => $param
    )
);
$context = stream_context_create($context);

$url = "https://data.city.yokohama.lg.jp/sparql/"; // WebAPIのURL
//$url = "https://dydra.com/haychmash/ramen/sparql";
//$url = "http://data.e-stat.go.jp/lod/sparql/alldata/query";

$contents = file_get_contents($url, false, $context);

echo $contents
?>

