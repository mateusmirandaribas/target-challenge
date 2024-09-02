<?php

require_once '../index.php';

function fibonacciCalc($startNumber): bool
{
    $previousNumber = 0;
    $currentNumber = 1;

    if ($startNumber == $previousNumber || $startNumber == $currentNumber) {
        return true;
    }

    while ($currentNumber < $startNumber) {
        $nextNumber = $previousNumber + $currentNumber;
        $previousNumber = $currentNumber;
        $currentNumber = $nextNumber;
    }

    return $currentNumber == $startNumber;
}

echo "Informe um número para análise de Fibonacci: ";
$inputNumber = (int) fgets(STDIN);

if (fibonacciCalc($inputNumber)) {
    echo "O número $inputNumber pertence à sequência de Fibonacci.";
} else {
    echo "O número $inputNumber não pertence à sequência de Fibonacci.";
}
