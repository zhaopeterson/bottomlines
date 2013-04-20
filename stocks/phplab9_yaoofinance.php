<?php
function show_stock_quotes ($stock_list) {
//The function will, by default, return the details of some of the stock markets:

//READ ON 

//Currency Conversion with Yahoo! Finance
//An Introduction to Google Finance
//Using Yahoo! Financial Stock Quotes
if (! $stock_list) {
$stock_list = "^IXIC,^DJA,^NIN,^FTSE";
}
//The function will then use either an input list or the default list to create the correct url:

$url = "http://quote.yahoo.com/d/quotes.csv?s="
. $stock_list . "&f=nl1c1&e=.csv";
//and then read in the data stream from the Yahoo! Finance web site:

$filesize = 2000;
$handle = fopen($url, "r");
$raw_quote_data = fread($handle, $filesize);
fclose($handle);
//The data will be in the format:

//"Novell",4.37,0.47
//"Microsoft",23.23,-1.68
//and so the next stage is to load the data into an array (using the new line as a delimiter):

$quote_array = explode("\n", $raw_quote_data);
//finally the results can be output (taking care to remove the additional quotation marks):

echo "<table>";
echo "<th>Name</th> <th>Stock Quote</th> <th>Change";
foreach ($quote_array as $quote_value) {
echo "<tr>";
$quote = explode(",", $quote_value);
$symbol = str_replace("\"", "", $quote[0]);
$value = $quote[1];
$change = $quote[2];
echo "<td>$symbol</td> <td>$value</td> <td>$change</td>";
echo "</tr>";
}
echo "</table>";
}
?>

