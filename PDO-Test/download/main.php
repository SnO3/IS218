<?php

require('PDO.php');

$pdo = DB::getConnection();

$stmt = $pdo->query('SELECT * FROM Users');
echo "Hello";
while ($row = $stmt->fetch())
{
    echo $row['Email'] . "\n";
}

?>