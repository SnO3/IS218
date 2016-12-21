#!/usr/bin/php
<?php

$var = addcslashes('HelloWorld', 'A..z');

echo "code: echo addcslashes('HelloWorld', 'A..z'); \n" . 'output: ' . $var . "\n\n";

echo "code: echo chr(65) . chr(66) . chr(67); \n" . 'output: ' . chr(65) . chr(66) . chr(67) . "\n\n";

echo "code: echo chunk_split('HelloWorld', 2, \"\\t\");\noutput: " . chunk_split('HelloWorld', 2, "\t") . "\n\n";

echo "code: foreach(count_chars('ABBCCC',1) as \$x => \$y) { echo chr(\$x) . ': ' . \$y . \"\\n\";}\noutput: \n";
foreach(count_chars('ABBCCC',1) as $x => $y)
{ 
	echo chr($x) . ': ' . $y . "\n";
}
echo "\n";

echo "code: echo 123\noutput: ";
echo '123' . "\n\n";

$var  = 'Hello World';
$var2 = explode(' ', $var);
echo "code:\n\$var1 = 'Hello World';\n\$var2 = explode(' ', \$var1);\necho \$var2[0] . ' ' . \$var2[1];\noutput:\n";
echo $var2[0] . ' ' . $var2[1] . "\n";
echo "\n";

$var = '<b>HelloWorld<\b>';
echo "code:\n\$var = '<b>HelloWorld<\b>';\necho htmlentities(\$var);\noutput:\n";
echo htmlentities($var) . "\n\n";

$var2 = htmlentities($var);
echo "code:\n\$var2 = htmlentities($var);\necho htmlspecialchars_decode(\$var2);\noutput:\n";
echo htmlspecialchars_decode($var2) . "\n\n";

$var = array('Hello', 'World');
echo "code:\n\$var = array('Hello', 'World');\n\$var2 = implode(\" \", \$var);\necho \$var2;\noutput:\n";
$var2 = implode(" ", $var);
echo $var2 . "\n\n";


echo "code:\necho md5('HelloWorld');\noutput:\n";
echo md5('HelloWorld') . "\n\n";

$var = "Hello\tWorld";
echo "code:\necho rtrim('HelloWorld      ') . '123';\noutput:\n";
echo rtrim('HelloWorld      ') . '123' . "\n\n";

$var = str_getcsv('a|b|c', '|');
echo "code:\n\$var = str_getcsv('a|b|c', '|');\necho \$var[0] . \$var[1] . \$var[2];\noutput:\n";
echo $var[0] . $var[1] . $var[2] . "\n\n";

echo "code:\necho strip_tags('<i><b>HelloWorld</b></i>', '<i></i>');\noutput:\n";
echo strip_tags('<i><b>HelloWorld</b></i>', '<i></i>') . "\n\n";

echo "code:\necho strpos('HelloWorld', 'W');\noutput:\n";
echo strpos('HelloWorld', 'W') . "\n\n";

echo "code:\necho strlen('HelloWorld');\noutput:\n";
echo strlen('HelloWorld') . "\n\n";
?>