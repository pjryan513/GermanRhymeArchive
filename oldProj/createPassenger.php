<!DOCTYPE html>
<html>
<body>
<h2>List of all passengers</h2>
<p>


<?php

if(isset($_POST['f'])){
?>

	<form action="updatePassenger.php" method="post">
		First Name: <input type="text"  name="first" value=<?php echo $_POST['f'] ?> required pattern="[a-zA-Z]+" title="Please only enter letters"><br>
		Middle Name: <input type="text" name="middle" value=<?php echo $_POST['m'] ?> ><br>
		Last Name: <input type="text" name="last" value=<?php echo $_POST['l'] ?> required pattern="[a-zA-Z]+" title="Please only enter letters"><br>
		SSN: <input type="text" name="ssn" value=<?php echo $_POST['s'] ?> required placeholder="555-55-5555" pattern="\d{3}-?\d{2}-?\d{4}" title="Please match the pattern ###-##-####"><BR>
		<input type="hidden" name="origssn" value=<?php echo $_POST['s'] ?>>
		<input type="submit" name="u" value="Update">
	</form>

<?php
}

else{?>

	<form action="newuser.php" method="post">
                First Name: <input type="text"  name="first" required pattern="[a-zA-Z]+" title="Please only enter letters"><br>
                Middle Name: <input type="text" name="middle" ><br>
                Last Name: <input type="text" name="last"  required pattern="[a-zA-Z]+" title="Please only enter letters"><br>
                SSN: <input type="text" name="ssn" required placeholder="555-55-5555" pattern="\d{3}-?\d{2}-?\d{4}" title="Please match the pattern ###-##-####"><BR>
                <input type="submit" name="create" value="Create">
        </form>

	<?php

	if (isset($_POST['create'])){
	$db_file = 'airport.db';
	try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $db->prepare("INSERT INTO passengers (f_name, m_name, l_name, ssn) VALUES (:first, :middle, :last, :ssn)");
	    $stmt->bindParam(':first', $_POST['first']);
	    $stmt->bindParam(':middle', $_POST['middle']);
	    $stmt->bindParam(':last', $_POST['last']);
	    $stmt->bindParam(':ssn', $_POST['ssn']);

	    //$db->execute($stmt);
	    $stmt->execute();

            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
	}

	//return success message 
	echo 'Your information has successfully been submitted:';
	echo ' First: '. $_POST['first'];
	echo ', Last: '. $_POST['last'];
	echo ', Middle: '. $_POST['middle'];
	echo ', SSN: '. $_POST['ssn'];
	header("Location: /~ubuntu/showPassengers.php");  }
}
?>

