<?php

$result = exec("ls");
print $result;

$files = system("ls /");
print "<br>";
print $files;

?>
