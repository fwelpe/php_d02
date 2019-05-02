#!/usr/bin/env php
<?php
$a = preg_match("/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([0-9]{1,2}) ([Jj]anvier|[Ff]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) ([0-9]{4})/", "Mardi 12 Novembre 2013 12:02:21", $matches);
echo $a, "\n";
echo $matches[0];
date_default_timezone_set('Europe/Moscow');
echo strtotime($matches[0]);
?>

