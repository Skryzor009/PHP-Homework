<?php

  //Conection to database
  $servername = "remotemysql.com";
  $username = "o8LxL7h9xu";
  $password = "8iqIEQbEUZ";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //echo "Connected successfully";
  
$myfrm = '
<!doctype html>
<html>
<form method="POST" action="">
<input type="text"
size="48"
name="sir_numere"
placeholder="introduceti numerele separate prin virgula">
<input type="submit">
</form>';

if (!isset($_POST['sir_numere'])) {

	echo "<br/>vom aduna cateva numere $myfrm";

} else {

	// echo $myfrm;

	$sir = $_POST['sir_numere'];
	$arr = explode(',', $sir);
	$nr = count($arr);
	$v = 0;

	if ($nr > 1) {

		$sir = "";
		$sum = 0;

		foreach ($arr as $value) {

			if (!preg_match("/^[0-9]*$/", $value)) {

				echo "valori incorecte";
				echo "<form><input type='submit' value='clear'></form>";
				$v = 1;
				break;

			} else {

				$sum += $value;
				$sir .= $value . " + ";

			}

		}

		if ($v == 0) {

			echo "<br/>suma celor $nr numere: ";
			$sir = substr($sir, 0, -3);
			echo "$sir = <span style='border:1px solid grey;padding:3px;background-color:#dedede;'> 
				$sum </span><br/><br/><form><input type='submit' value='clear'></form>";
		}

	} else {

		echo "valori insuficiente";
		echo "<form><input type='submit' value='clear'></form>";

	}
}
