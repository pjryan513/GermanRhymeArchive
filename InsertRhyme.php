--<?php
        if (isset($_POST['flor'])){
        $db_file = "hoop6.db";
        try {
            //open connection to the airport database file
            $db = new PDO("sqlite:" . $db_file);
             //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    $stm = $db->prepare("SELECT rID FROM rhyme WHERE flor = :flor");
	    $stm->bindParam(":flor", $_POST["flor"]);
	    $stm->execute();
	    $temp = $stm->fetchAll();
	    if(count($temp) == 0){
            	$stmt = $db->prepare("INSERT INTO rhyme VALUES(null, :flor)");
            	$stmt->bindParam(":flor", $_POST["flor"]);
            	$stmt->execute();
            	$rID = $db->lastInsertId();
            	session_start();
            	$vID = $_SESSION["volumeID"];

            	$stmt2 = $db->prepare("INSERT INTO contains VALUES(:vID, :rID, :illu)");
            	$stmt2->bindParam(":vID", $vID);
            	$stmt2->bindParam("rID", $rID);
            	$stmt2->bindParam("illu", $_POST["illu"]);
            	$stmt2->execute();

            	$v1 = $_POST["prf"];
            	$v2 = $_POST["pif"];
	    	if (strpos($v2, ',') !== false){
            		$prf = explode('-', $v1);
            		$pif = explode(',', $v2);
            		for($i = 0;$i < count($prf);$i++){
                		for($j = 0;$j < count($pif);$j++){
                    			$stmt3 = $db->prepare("INSERT INTO drawn VALUES(:rID, :prf, :illt, :pif, :volumeID)");
                    			$stmt3->bindParam(":rID", $rID);
                    			$stmt3->bindParam(":prf", $prf[$i]);
                    			$stmt3->bindParam(":illt", $_POST["illt"]);
                    			$stmt3->bindParam(":pif", $pif[$j]);
                    			$stmt3->bindParam(":volumeID", $vID);
                    			$stmt3->execute();
                		 }
            		 }
	        }
	    	else{
		     $prf = explode('-', $v1);
                        for($i = 0;$i < count($prf);$i++){
                                   $stmt3 = $db->prepare("INSERT INTO drawn VALUES(:rID, :prf, :illt, :pif, :volumeID)");
                                   $stmt3->bindParam(":rID", $rID);
                                   $stmt3->bindParam(":prf", $pif[$i]);
                                   $stmt3->bindParam(":illt", $_POST["illt"]);
                                   $stmt3->bindParam(":pif", $_POST["pif"]);
                                   $stmt3->bindParam(":volumeID", $vID);
                                   $stmt3->execute();
			}
		}
	    }
	    else{
		     $temp = $temp[0][0];
		     session_start();
                     $vID = $_SESSION["volumeID"];
		     $stmt2 = $db->prepare("INSERT INTO contains VALUES(:vID, :rID, :illu)");
               	     $stmt2->bindParam(":vID", $vID);
              	     $stmt2->bindParam("rID", $temp);
                     $stmt2->bindParam("illu", $_POST["illu"]);
                     $stmt2->execute();

                     $v1 = $_POST["prf"];
                     $v2 = $_POST["pif"];
                if (strpos($v2, ',') !== false){
                        $prf = explode('-', $v1);
                        $pif = explode(',', $v2);
                        for($i = 0;$i < count($prf);$i++){
                                for($j = 0;$j < count($pif);$j++){
                                        $stmt3 = $db->prepare("INSERT INTO drawn VALUES(:rID, :prf, :illt, :pif, :volumeID)");
                                        $stmt3->bindParam(":rID", $temp);
                                        $stmt3->bindParam(":prf", $pif[$i]);
                                        $stmt3->bindParam(":illt", $_POST["illt"]);
                                        $stmt3->bindParam(":pif", $pif[$j]);
                                        $stmt3->bindParam(":volumeID", $vID);
                                        $stmt3->execute();
                                 }
                         }
                }
                else{
			$prf = explode('-', $v1);
                        for($i = 0;$i < count($prf);$i++){
                                   $stmt3 = $db->prepare("INSERT INTO drawn VALUES(:rID, :prf, :illt, :pif, :volumeID)");
                                   $stmt3->bindParam(":rID", $temp);
                                   $stmt3->bindParam(":prf", $prf[$i]);
                                   $stmt3->bindParam(":illt", $_POST["illt"]);
                                   $stmt3->bindParam(":pif", $_POST["pif"]);
                                   $stmt3->bindParam(":volumeID", $vID);
                                   $stmt3->execute();
                }
	    }
	}
            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }

        //return success message
        //echo 'Rhyme has been added:';
        //echo ' rID: '. $rID;
        //echo ', First Line of the Rhyme: '. $_POST['flor']. "<br>";

        //echo 'Contains updated:';
        //echo ' volumeID: '. $vID;
        //echo ', rID: '. $rID;
        //echo ', Illustrated: '. $_POST['illu']. "<br>";

        //echo 'Drawn updated:';
        //echo ' rID: '. $rID;
        //echo ', Pages Rhyme found on: '. $_POST['prf'];
        //echo ', Illustration Type: '. $_POST['illt'];
        //echo ', Pages Illustration Found: '. $_POST['pif'];
        //echo ', VolumeID: '. $vID;
        }
?>
<html>
        <head>
                <title>Insert</title>
                <link rel="stylesheet" type="text/css" href="style/style.css">
        </head>
<body>
<div class="Search">
<p class = "Header">Add another rhyme to the same volume:</p>
<div class ="Search_area">
<form action = "InsertRhyme.php" method = "post">
First line of rhyme: <input class = "text" type = "text" name = "flor"><br>
Pages rhyme found (Separated by  "-" Ex: 55-57): <input class = "text"  type = "text" name = "prf"><br>
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
Pages Illustration found (Separated by "," Ex: 44,45,47): <input class = "text" type = "text" name = "pif"><br>
<input type="submit">
</form>
</div>
</div>
		<div class="Search">
		<p class="Header">Insert Into Database Was Successful</p>
		<form action = "index.html" method = "post">
			<input type="submit" value = "Done">
		</form>
		</div>
	</body>
</html>
