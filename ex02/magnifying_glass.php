#!/usr/bin/php
<?php
function parse_change_title ($s) {
    $s = preg_replace_callback('/title="(.*?)"/', function ($l) {
        print_r($l);
        return ('title="' . mb_strtoupper($l[1]) . '"');
    }, $s);
    return ($s);
}

function parse ($s) {
    $s = preg_replace_callback("/<a(.*?)>((<.*?>)*)(.*?)((<.*?>)*)<\/a>/", function ($m) {
        print_r($m);
        return ("<a" . parse_change_title($m[1]) . ">" . parse_change_title($m[2]) . mb_strtoupper($m[4]) . parse_change_title($m[5]) . "</a>");
    }, $s);
    return ($s);
}

if ($argc > 1) {
    if (!file_exists($argv[1])) {
        echo "No such file.\n";
        exit(-42);
    }
    $f = file_get_contents($argv[1]);
    // $f = parse_change_title($f);
    $f = parse($f);
    echo $f;
}
?>
