<?php
        if (isset($_POST['title'])){
        $db_file = "hoop6.db";
	$paginated = $_POST['paginated'];
	$external = $_POST['external'];
        try {
            //open connection to the airport database file
            $db = new PDO("sqlite:" . $db_file);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->prepare("INSERT INTO volume VALUES(null, :dateP, :p, :ext, :title);");
            $stmt->bindParam(":dateP", $_POST["datePublished"]);
            $stmt->bindParam(":p", $paginated);
            $stmt->bindParam(":ext", $external);
            $stmt->bindParam(":title", $_POST["title"]);
            $stmt->execute();
            $result =  $db->lastInsertId();
	    session_start();
	    $_SESSION['volumeID'] = $result;
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }
        }
?>
<html>
	<head>
		<title>Insert Volume</title>
		 <link rel="stylesheet" type="text/css" href="style/style.css">
	</head>
	<body>
		<div class="Search">
		<p class="Header">Insert Illustrator</p>
		<div class="Search_area">
		<form action="InsertIllustrator.php" method="post">
			Last Name: <input class="text" type="text" name="lname"><br>
			First Name: <input class="text" type="text" name="fname"><br>
			Gender (M or F):
			<select name = "gender">
  			<option value="M">M</option>
  			<option value="F">F</option>
			</select>
			<br>
			Date of Birth: <input class="text" type="text" name="dob"><br>
			Date of Death: <input class="text" type="text" name="dod"><br>
			Source 1: <input class="text" type="text" name="source1"><br>
			Source 2: <input class="text" type="text" name="source2"><br>
			<input type="submit">
		
		</form>
		</div>
		</div>
	</body>
</html>
