
<form class="form1" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    <h2>Placeholder Lorem Ipsum</h2>
      Furnizori: <input type="text" name="Furnizori" value="<?php echo $Furnizori;?>">
      <input type="submit" name="submit" value="Submit">  
</form>

<?php

  //Conection to database
  $servername = "remotemysql.com";
  $username = "TvLEwEK10r";
  $password = "iQ5VxN0MUr";

  // Create connection
  $conn = new mysqli($servername, $username, $password);

  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";

  if (empty($_POST["Furnizori"])) {
    $FurnizoriErr = "Name is required";
  } else {
    $Furnizori = $_POST["Furnizori"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$Furnizori)) {
      $FurnizoriErr = "Only letters and white space allowed";
    }
  }

if($_POST["Furnizori"]!=""){
	$sql = "INSERT INTO TvLEwEK10r.Table_1 (Furnizori)
		VALUES ('$Furnizori')";
	if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}
	$Furnizori="";
}

  $sql = "SELECT ID, Furnizori FROM TvLEwEK10r.Table_1";
  $result = $conn->query($sql);
  echo "<br><h2>Your Input:</h2>";
  echo '<table><tr>';
  echo '<th>'."ID ".'</th>';
  echo '<th>'."Furnizori ".'</th>';
  
  echo '</tr><tbody>';
  if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {
		echo '<tr>';
		echo "<td>". $row["ID"].'</td>'."<td>". $row["Furnizori"].'</td>';
		echo '</tr>';
	}
  } else {
	echo "0 results";
  }

?>

<form class="delete" action="" method="post">
      id: <input type="number" name="name" value="<?php echo $numberId;?>">
      <button type="submit" name="sub" value="">Delete</button>

 <?php


if (isset($_POST['name'])){


  $sql = "DELETE FROM TvLEwEK10r.Table_1 WHERE ID=".$_POST['name'];
  if ($conn->query($sql) === TRUE) {
	echo "Record deleted successfully";
  } else {
	echo "Error deleting record: " . $conn->error;
  }
}

?>
</form>