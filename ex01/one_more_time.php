#!/usr/bin/env php
<?php
function parse_month($month_str) {
    if ($month_str == "janvier" || $month_str == "Janvier")
		return (1);
	if ($month_str == "fevrier" || $month_str == "Fevrier")
		return (2);
	if ($month_str == "mars" || $month_str == "Mars")
		return (3);
	if ($month_str == "avril" || $month_str == "Avril")
		return (4);
	if ($month_str == "mai" || $month_str == "Mai")
		return (5);
	if ($month_str == "Juin" || $month_str == "juin")
		return (6);
	if ($month_str == "juillet" || $month_str == "Juillet")
		return (7);
	if ($month_str == "Aout" || $month_str == "aout")
		return (8);
	if ($month_str == "septembre" || $month_str == "Septembre")
		return (9);
	if ($month_str == "octobre" || $month_str == "Octobre")
		return (10);
	if ($month_str == "novembre" || $month_str == "Novembre")
		return (11);
	if ($month_str == "decembre" || $month_str == "Decembre")
		return (12);
	else
		return (0);
}

function parse_day($day_str) {
	if ($day_str == "lundi" || $day_str == "Lundi")
		return (1);
	if ($day_str == "mardi" || $day_str == "Mardi")
		return (2);
	if ($day_str == "mercredi" || $day_str == "Mercredi")
		return (3);
	if ($day_str == "jeudi" || $day_str == "Jeudi")
		return (4);
	if ($day_str == "vendredi" || $day_str == "Vendredi")
		return (5);
	if ($day_str == "samedi" || $day_str == "Samedi")
		return (6);
	if ($day_str == "dimanche" || $day_str == "Dimanche")
		return (7);
}

function w_format () {
	print "Wrong format\n";
	exit(-42);
}

if ($argc > 1) {
	date_default_timezone_set('Europe/Moscow');

	$a = preg_match("/([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vv]endredi|[Ss]amedi|[Dd]imanche) ([0-9]{1,2}) ([Jj]anvier|[Ff]vrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctobre|[Nn]ovembre|[Dd]ecembre) ([0-9]{4}) ([0-9]{2}:[0-9]{2}:[0-9]{2})/", $argv[1], $m);
	if (!$a)
		w_format();
	$m[1] = parse_day($m[1]);
	$m[3] = parse_month($m[3]);
	if (!checkdate($m[3], $m[2], $m[4]))
		w_format();
	$unix_timestamp = strtotime("$m[2]-$m[3]-$m[4] $m[5]");
	// print_r($m);
	$N = date("N", $unix_timestamp);
	if (($N != $m[1]) || !$unix_timestamp)
		w_format();
	echo $unix_timestamp, "\n";
}
?>
