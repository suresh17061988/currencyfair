<?php
// We declare header so that browser can understand that file has to download rather than display
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=currency.csv');

// open file to write
$output = fopen('php://output', 'w');

// CSV column headings
fputcsv($output, array('currency', 'daily', 'weekly', 'monthly','yearly'));

//fetch the data
mysql_connect('localhost', 'root', '');
mysql_select_db('currency-fair');
$rows = mysql_query('SELECT * FROM `currency_demand`');

// loop for output
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
?>
