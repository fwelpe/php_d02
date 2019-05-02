#!/usr/bin/env php
<?php
if ($argc > 1)
{
    $arr = array_filter(
        explode(" ", $argv[1])
    );
    foreach ($arr as $elem) {
        trim($elem);
    }
    $str = implode($arr, " ");
    print "$str\n";
}
?>
