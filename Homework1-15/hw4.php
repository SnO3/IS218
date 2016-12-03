#!/usr/bin/php
<?php

$myfile = fopen("hw4.csv", "r") or die("Unable to open file!");
$csv_array = str_getcsv( fread($myfile, filesize('hw4.csv')), "," );
fclose($myfile);

var_dump($csv_array);

?>