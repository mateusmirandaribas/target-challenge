<?php

require_once '../index.php';

$higherRevenue = 0;
$lowerRevenue = PHP_INT_MAX;
$billingResult = 0;
$billingDays = 0;
$dayAboveAverage = 0;

$jsonData = file_get_contents('../resources/billing.json');
$billingData = json_decode($jsonData, true);

foreach ($billingData['Billing'] as $day) {
    $valueDay = $day['value'];

    if ($valueDay > 0) {
        if ($valueDay < $lowerRevenue) {
            $lowerRevenue = $valueDay;
        }

        if ($valueDay > $higherRevenue) {
            $higherRevenue = $valueDay;
        }

        $billingResult += $valueDay;
        $billingDays++;
    }
}

$averageRevenue = $billingResult / $billingDays;

foreach ($billingData['Billing'] as $day) {
    $valueDay = $day['value'];
    if ($valueDay > $averageRevenue) {
        $dayAboveAverage++;
    }
}

if ($lowerRevenue === PHP_INT_MAX) {
    $lowerRevenue = 0;
}

echo "Menor faturamento em um dia do mês: R$ " . number_format($lowerRevenue, 2, ',', '.') . "\n";
echo "Maior faturamento em um dia do mês: R$ " . number_format($higherRevenue, 2, ',', '.') . "\n";
echo "Número de dias com faturamento acima da média mensal: $dayAboveAverage\n";
