<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Currency fair json Data</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="form-style-2">
<div class="form-style-2-heading">Requested Currency Exchange</div>
<?php include 'connection.php';
$user = $_POST['userid']; $amount = $_POST['amount'];$from = $_POST['from'];$to = $_POST['currencyTo'];$date = $_POST['date'];
$country = $_POST['country'];$rate = $_POST['rate'];
if($rate > 0){
$amountBuy = $amount * $rate;
$arr = array('userId' => $user, 'currencyFrom' => $from, 'currencyTo' => $to, 'amountSell' => $amount, 'amountBuy' => $amountBuy, 'rate' => $rate, 'timePlaced' => $date,'originatingCountry' => $country);
}else{
$amountBuy = $amount / $rate;
$arr = array('userId' => $user, 'currencyFrom' => $from, 'currencyTo' => $to, 'amountSell' => $amount, 'amountBuy' => $amountBuy, 'rate' => $rate, 'timePlaced' => $date,'originatingCountry' => $country);
}
$json = json_encode($arr); 
$data = json_decode($json, true);
$jsonIterator = new RecursiveIteratorIterator(
    new RecursiveArrayIterator(json_decode($json, TRUE)),
    RecursiveIteratorIterator::SELF_FIRST);

foreach ($jsonIterator as $key => $val) {
    if(is_array($val)) {
       echo "$key:\n";
    } else { ?>
       <?php /*echo "$key => $val\n";
    }
} */?>

		<label for="field1"><span><?php echo $key; ?></span><input type="text" class="input-field" name="human" value="<?php echo $val; ?>" readonly="true"/></label> 
		<?php }
		} ?>
	<?php $userid = $data['userId']; $currencyFrom = $data['currencyFrom']; $currencyTo = $data['currencyTo']; $amountSell = $data['amountSell'];
	$amountBuy = $data['amountBuy']; $rate = $data['rate']; $timePlaced = $data['timePlaced']; $originatingCountry = $data['originatingCountry'];
	$sql = "INSERT INTO message_consumption (userId,currencyFrom,currencyTo,amountSell,amountBuy,rate,timePlaced,originatingCountry)
VALUES ('$userid','$currencyFrom','$currencyTo','$amountSell','$amountBuy','$rate','$timePlaced','$originatingCountry')"; 
if ($conn->query($sql) === TRUE) {
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
} ?>
	<p id="special">To check currency exchange processing <a href="parallel.php">Click Here</a></p>
		</div>
</body>
</html>
