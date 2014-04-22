<?php

$original = array();
$found = array();
$not_found = array();

$handle = @fopen("original.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		$original[] = $line;
    }
} else {
    // error opening the file.
}
fclose($handle);

$handle = @fopen("found.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
		$parts = explode(':', $line);
		$found[] = $parts[0];
    }
} else {
    // error opening the file.
}
fclose($handle);

$i = 0;
$contents = '';
foreach ($original as $user)
{
	$part = explode(':', $user);
	if ( ! in_array($part[0], $found))
	{
		$contents .= $user;
		$not_found[] = $user;
		$i++;
		//echo $i . ' '. $user . '<br>';
		echo $part[1] . '<br>';
		if ($i %32 == 0)
		{
			echo '<br><br>';
		}
	}
}

file_put_contents('not_found.txt', $contents);

?>