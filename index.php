<?php

ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$dbc=mysqli_connect('localhost', 'root', '');

mysqli_query($dbc,'CREATE DATABASE new_data;');
mysqli_select_db($dbc, 'new_data');

$query = 'CREATE TABLE IF NOT EXISTS handles_values(ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, h1 INT, h2 INT , h3 INT , h4 INT , h5 INT , h6 INT );';
mysqli_query($dbc, $query);

	$h1 = $_POST['h1'];
	$h2 = $_POST['h2'];
	$h3 = $_POST['h3'];
	$h4 = $_POST['h4'];
	$h5 = $_POST['h5'];
	$h6 = $_POST['h6'];
	
	if (isset($_POST['save'])) {
		$query = "INSERT INTO handles_values(h1, h2, h3, h4,h5,h6) VALUES ('$h1','$h2','$h3','$h4','$h5','$h6');";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		header('location: index.html');
	}
	
	//mysqli_close($dbc);

/////////////////////////////////////////
$query1 = 'CREATE TABLE IF NOT EXISTS on_values(ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,handle_on VARCHAR(10));';
mysqli_query($dbc, $query1);

      if (isset($_POST['on'])) {

		$query = "INSERT INTO on_values(handle_on) VALUES ('on');";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		header('location: index.html');
	}
	mysqli_close($dbc);




session_start();
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

$dbc=mysqli_connect('localhost', 'root', '');
@mysqli_select_db($dbc, 'new_data');

$query = 'CREATE TABLE IF NOT EXISTS DirectioneB (ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,forwardB VARCHAR(10), leftB VARCHAR(10) , stopB VARCHAR(10) , rightB VARCHAR(10), backwardB VARCHAR(10) );';
mysqli_query($dbc, $query);


$sql = "SELECT * FROM DirectioneB;";
$result = mysqli_query($dbc, $sql);

if (mysqli_num_rows($result) != 0) {

	if (isset($_POST['left'])) {
		$query = "UPDATE DirectioneB SET leftB = 'l';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
        
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[2];
}
		header('location: display.php');
	}

	else if (isset($_POST['stop'])) {
		$query = "UPDATE DirectioneB SET stopB= 's';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}

        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[3];
}
		header('location: display.php');
	
	}

	else if (isset($_POST['right'])) {
		$query = "UPDATE DirectioneB SET rightB= 'r';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[4];
}
		header('location: display.php');
		
	}

	else if (isset($_POST['forward'])) {
		$query = "UPDATE DirectioneB SET forwardB= 'f';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}  
		
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[1];
}
		header('location: display.php');
		
	}

	else if (isset($_POST['backward'])) {
		$query = "UPDATE DirectioneB SET backwardB= 'b';";
		if (mysqli_query($dbc, $query)) {
			echo "Updated";
		} else {
			echo "<br>" . mysqli_error($dbc);
		}
		
        $query = "SELECT * FROM DirectioneB ;";
        $result = mysqli_query($dbc, $query);

    while($row = mysqli_fetch_row($result)) {
    
        $_SESSION['D']= $row[5];
}
		header('location: display.php');
		
	}
}

	else{

		$query = "INSERT INTO directioneb(forwardB, leftB, stopB, rightB,backwardB) VALUES ( '0', '0', '0','0', '0');";
	mysqli_query($dbc, $query);

	}
	
	//mysqli_close($dbc);
?>