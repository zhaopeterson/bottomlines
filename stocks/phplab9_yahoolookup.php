<?php
include ("phplab9_yahoofinance.php");
$symbol_list = str_replace("\n", ",", $_REQUEST["symbol_list"]);
$symbol_list = str_replace("\r", ",", $symbol_list);
show_stock_quotes (False);
show_stock_quotes ($symbol_list);
?>
