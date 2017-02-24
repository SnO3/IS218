<?php

$tables = array('People Table' => 
				array('headers' => array('First', 'Last', 'Age'),
					  'rows'    => array(array('John', 'Doe', 24),
					  						  array('Jane', 'Doe', 27),
					  						  array('Bill', 'Nye', 60)
					  						 )
					 )
			);
//hello
foreach ($tables as $tName => $content) {
	echo '<b>' . $tName . ':</b><br><br>';
	echo '<table>';

	echo '<thead><tr>';
	foreach ($content['headers'] as $h)
	{
		echo '<th>' . $h . '</th>';
	}
	echo '</tr></thead><tbody>';

	foreach ($content['rows'] as $r) 
	{

		echo '<tr>';
		foreach ($r as $cell) {
			echo '<td>' . $cell . '</td>';
		}
		echo '</tr>';

	}

	echo '</tbody></table>';
	
}

?>