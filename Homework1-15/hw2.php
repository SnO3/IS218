#!/usr/bin/php
<?php

$var = array('Hello', 'World');
$var2 = array('Hello', 'New', 'World');
echo "code:\n\$var = array('Hello', 'World');\n\$var2 = array('Hello', 'New', 'World');\nprint_r(array_diff(\$var2, \$var));\noutput:\n";
print_r(array_diff($var2, $var));
echo "\n\n";

echo "code:\nprint_r(array_fill(2, 2, 'New'));\noutput:\n";
print_r(array_fill(2, 2, 'New'));
echo "\n\n";

echo "code:\nprint_r(array_flip(\$var2));\noutput:\n";
print_r(array_flip($var2));
echo "\n\n";

$var3 = array('one' => 1, "two" => 2, "three" => 3);
echo "code:\n\$var3 = array('one' => 1, 'two' => 2, 'three' => 3);\nprint_r(array_keys(\$var3));\noutput:\n";
print_r(array_keys($var3));
echo "\n";

echo "code:\nif(array_key_exists('two', \$var3)) { echo \"'two' key exists in \$var3\"; }\noutput:\n";
if(array_key_exists('two', $var3)) { echo "'two' key exists in \$var3"; }
echo "\n\n";

echo "code:\necho \$var2[array_rand(\$var2)];\noutput:\n";
echo $var2[array_rand($var2)] . "\n\n";

array_push($var, '123');
echo "code:\narray_push(\$var, '123');\noutput:\n";
print_r($var);
echo "\n";

array_pop($var);
echo "code:\narray_pop(\$var);\noutput:\n";
print_r($var);
echo "\n";

$var4 = array(2,3);
echo "code:\n\$var4 = array(2,3);\necho array_sum(\$var4);\noutput:\n";
echo array_sum($var4) . "\n\n";

echo "code:\necho array_product(\$var4);\noutput:\n";
echo array_product($var4) . "\n\n";

echo "code:\nprint_r(array_reverse(\$var));\noutput:\n";
print_r(array_reverse($var)); 
echo "\n";

echo "code:\nprint_r(array_unique(array(1,1,1,2)));\noutput:\n";
print_r(array_unique(array(1,1,1,2)));
echo "\n";

echo "code:\nprint_r(array_values(\$var));\noutput:\n";
print_r(array_values($var));
echo "\n";

echo "code:\nif(in_array('New', \$var2)){ echo \"'New' is in \$var2\"; }\noutput:\n";
if(in_array('New', $var2)){ echo "'New' is in \$var2\n\n"; }

echo "code:\nprint_r(array_pad(\$var, 5, 0));\noutput:\n";
print_r(array_pad($var, 5, 0));

?>