
<!DOCTYPE html>
<html>
<body>
<h2>Search Results</h2>
<p>
    <?php

        //path to the SQLite database file
        $db_file = 'hoop1.db';

        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$flor = $_POST['flor'];
		$illuL = $_POST['illuL'];
		$illuF = $_POST['illuF'];
		$dateStart = $_POST['dateStart'];
		$dateEnd = $_POST['dateEnd'];
		//$count = $_POST['count'];
		$male = $_POST['male'];
		$female = $_POST['female'];
		$illuB = $_POST['only'];
		$qArray = array();
		if(!empty($flor)){
			array_push($qArray, "SELECT * FROM contains WHERE rID IN (SELECT rID FROM rhyme WHERE flor = '$flor')");
		}
		if(!empty($illuL) and !empty($illuF)){
			array_push($qArray, "SELECT * FROM drawn NATURAL JOIN illustrator NATURAL JOIN (SELECT * FROM drawFor WHERE illustratorID IN (SELECT illustratorID FROM illustrator WHERE lname = '$illuL' AND fname = '$illuF'))");
		}
		// 1700 is base
		// 2020 is top
		if(!empty($dateStart) and empty($dateEnd){
			array_push($qArray, "SELECT * FROM contains NATURAL JOIN volume NATURAL JOIN rhyme WHERE rID IN (SELECT rID FROM rhyme) AND datePublished > $dateStart AND datePublished < 2020");
		}
		if(empty($dateStart) and !empty($dateEnd){
			array_push($qArray, "SELECT * FROM contains NATURAL JOIN volume NATURAL JOIN rhyme WHERE rID IN (SELECT rID FROM rhyme) AND datePublished > 1700 AND datePublished < $dateEnd");
		}
		if(!empty($dateStart) and !empty($dateEnd){
			array_push($qArray, "SELECT * FROM contains NATURAL JOIN volume NATURAL JOIN rhyme WHERE rID IN (SELECT rID FROM rhyme) AND datePublished > $dateStart AND datePublished < $dateEnd");
                }
		if(!empty($female)){
			array_push($qArray, "SELECT DISTINCT * FROM contains NATURAL JOIN drawFor NATURAL JOIN illustrator NATURAL JOIN rhyme WHERE rID IN (SELECT rID FROM rhyme) AND gender = 'm' ORDER BY volumeID");
		}
		if(!empty($male)){
			array_push($qArray, "SELECT DISTINCT * FROM contains NATURAL JOIN drawFor NATURAL JOIN illustrator NATURAL JOIN rhyme WHERE rID IN (SELECT rID FROM rhyme) AND gender = 'f' ORDER BY volumeID");
		}
		if(!empty)

	$qString = "";
	$keys = array_keys($qArray);
	// if there is only one query  we automatically  just use that 
	if(sizeof($qArray) ==1){
		print_r($qArray);
		$qString = $qArray[0];
		$qString .= ";";
		echo $qString;
	}
	else{
		$vars = array("a", "b", "c", "d");
		foreach($qArray as $key=>$value){
			if($key==0){$with = "with ";}
			else{$with=", ";}
			$temp = $with.$vars[$key]." as (". $value . ")";
			$qString .= $temp;
		}
		$select ="select * from ";
		foreach($qArray as $key=>$value){
			$select .= " ".$vars[$key];
			if($key<sizeof($qArray)-1){$select.=" NATURAL JOIN";}
		}
		$qString .=  $select.";";
	}
	echo $qString;
	$qResult = $db->query($qString);
        //$count_result = $db->query($count);
	//while ($row = $count_result->fetch(PDO::FETCH_ASSOC))
	//{
		//useful for getting info about variables print_r($row);
	//	echo $row["count(illustratorID)"];
	//}
     	//echo "<h5> $tempcount <h5>";
        foreach($qResult as $tuple) {
        	//echo "<hr><font color='blue'>$tuple[rID]</font> $tuple[volumeID]";}
		echo "<hr>";
		print_r($tuple);
	}
            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }
    ?>

</p>
</body>
</html>
