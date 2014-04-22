<?php

$original = array();
$found = array();
$not_found = array();

$handle = @fopen("last.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		$parts = explode(':', $line);
		if (key_exists('3', $parts))
		{
			$found[] = $parts[0] . ':' . rtrim($parts[3]);
		}
		else
		{
			$not_found[] = $parts[0] . ':' . $parts[1];
		}
    }
} else {
    // error opening the file.
}
fclose($handle);

$contents = '';
foreach ($found as $result)
{
		$contents .= $result . PHP_EOL;
}

file_put_contents('found.txt', $contents);

$contents = '';
foreach ($not_found as $result)
{
		$contents .= $result . PHP_EOL;
}

file_put_contents('not_found.txt', $contents);

echo 'written found and not found .txt';

?>