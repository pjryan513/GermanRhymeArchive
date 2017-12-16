<?php
        if (isset($_POST['lname'])){
        $db_file = "hoop6.db";
        try {
            //open connection to the hooper database file
            $db = new PDO("sqlite:" . $db_file);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    //Check to see if this illustrator is unique
	    $stm = $db->prepare("SELECT illustratorID FROM illustrator WHERE lname = :lname AND fname = :fname");
	    $stm->bindParam(":lname", $_POST["lname"]);
	    $stm->bindParam(":fname", $_POST["fname"]);
	    $stm->execute();
	    $temp = $stm->fetchAll();
	    if(count($temp) == 0){
            	//Insert into illustrator
            	$stmt = $db->prepare("INSERT INTO illustrator VALUES(null, :lname, :fname, :gender, :dob, :dod, :s1, :s2)");
            	$stmt->bindParam(":lname", $_POST["lname"]);
            	$stmt->bindParam(":fname", $_POST["fname"]);
            	$stmt->bindParam(":gender", $_POST["gender"]);
            	$stmt->bindParam(":dob", $_POST["dob"]);
           	$stmt->bindParam(":dod", $_POST["dod"]);
           	$stmt->bindParam(":s1", $_POST["source1"]);
           	$stmt->bindParam(":s2", $_POST["source2"]);
            	$stmt->execute();
            	//echo $db->lastInsertId();
            	$result = $db->lastInsertId();
            	session_start();
            	$vID = $_SESSION["volumeID"];
            	//Insert into draw For
            	$stmt2 = $db->prepare("INSERT INTO drawFor VALUES(:volumeID, :illustratorID)");
            	$stmt2->bindParam(":volumeID", $vID);
            	$stmt2->bindParam(":illustratorID", $result);
            	$stmt2->execute();
            	$db = null;
	     }
	    else{
		//Insert into illustrator
                $temp = $temp[0][0];
                session_start();
                $vID = $_SESSION["volumeID"];
                //Insert into draw For
                $stmt2 = $db->prepare("INSERT INTO drawFor VALUES(:volumeID, :illustratorID)");
                $stmt2->bindParam(":volumeID", $vID);
                $stmt2->bindParam(":illustratorID", $temp);
                $stmt2->execute();
                $db = null;
	    }
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }

        }
?>
<html>
	<head>
		<title>Insert Rhyme</title>
		 <link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<!--Please enter the following information about the new rhyme:-->
		<div class="Search">
		<p class="Header">Insert Rhyme</p>
		<div class="Search_area">
		<form action = "InsertRhyme.php" method = "post">
			First line of rhyme: <input class="text" type = "text" name = "flor"><br>
			Pages rhyme found (Separated by  "-" Ex: 55-57): <input class="text" type = "text" name = "prf"><br>
			Illustrated (Yes or No): 
			<select name = "illu">
			  <option value="Yes">Yes</option>
			  <option value="No">No</option>
			</select><br>
			Illustration Type (b/w, color, color plate):
			<select name = "illt">
			<option value="b/w">b/w</option>
			<option value="color">color</option>
			<option value="color plate">color plate</option>
			</select><br>
			Pages Illustration found (Separated by "," Ex: 44,45,47): <input class="text type = "text" name = "pif"><br>
			<input type="submit">
		</form>
		</div>
		</div>
	</body>
</html>
