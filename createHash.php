<?php

$inputFile = 'path/of/file';
$outputFile = 'inc/result/result-';
$numberOfLopp = 10000;
$count = 1;
$idOfFile = 1;
//Reset file
//file_put_contents($outputFile . $idOfFile . '.txt', '');

// Read file line by line
$handle = fopen($inputFile, "r") or die("Couldn't get handle");
if ($handle) {
    echo 'work in progress ...';
    while (!feof($handle)) {
        if ($count <= $numberOfLopp) {
            $buffer = fgets($handle, 4096);
            $buffer = trim($buffer);
            $buffer = $buffer . ';' . sha1($buffer) . ';' . md5($buffer);
            file_put_contents($outputFile . $idOfFile . '.txt', $buffer, FILE_APPEND | LOCK_EX);
            file_put_contents($outputFile . $idOfFile . '.txt', "\n", FILE_APPEND | LOCK_EX);
            $count++;
        } else {
            $count = 1;
            $idOfFile++;
        }
    }
    fclose($handle);
}
