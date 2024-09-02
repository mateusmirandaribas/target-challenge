<?php

require_once '../index.php';

$billingByState = [
    "SP" => 67836.43,
    "RJ" => 36678.66,
    "MG" => 29229.88,
    "ES" => 27165.48,
    "Outros" => 19849.53
];

$totalRevenue = array_sum($billingByState);

foreach ($billingByState as $state => $invoicing) {
    $percentage = ($invoicing / $totalRevenue) * 100;
    echo "Estado: $state - Percentual de Representação: " . number_format($percentage, 2, ',', '.') . "%\n";
}
