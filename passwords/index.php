<?php
/**
* Reads in passwords and saves them in a useable format for processing with password cracker
*
*/

$row = 1;

$lines = array();
if (($handle = fopen("users.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        $row++;
        for ($c=0; $c < $num; $c++) {
			$line = explode(':', $data[$c]);
			
			//$lines[] = $line[0] . ':' . $line[1];
        }
    }
    fclose($handle);
}

array_shift ($lines);

$formatted_file = 'output.txt';

$contents = '';
foreach ($lines as $line)
{
	$contents .= $line . PHP_EOL;
}

file_put_contents($formatted_file, $contents);

echo 'users.csv > output.txt complete';

?>