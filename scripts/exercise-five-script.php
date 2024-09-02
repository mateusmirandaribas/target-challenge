<?php

require_once '../index.php';

echo "Digite a string que deseja inverter: ";
$inputString = (string) fgets(STDIN);

$reversedString = "";

for ($index = strlen($inputString) - 1; $index >= 0; $index--) {
    $reversedString .= $inputString[$index];
}

echo "String original: $inputString\n";
echo "String invertida: $reversedString\n";
