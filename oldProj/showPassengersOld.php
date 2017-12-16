<!DOCTYPE html>
<html>
<body>
<h2>List of all passengers</h2>
<p>
    <?php

        //path to the SQLite database file
        $db_file = '/etc/myDB/airport.db';
	//print out passenger_ssn passed in through URL
                 echo $_GET["passenger_ssn"]."\n<br/>";
        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //return a passenger given an ssn
            $query_str = $db->prepare("select * from passengers where ssn = ?");
	    if ($query_str->execute(array($_GET["passenger_ssn"]))){
		while ($row = $query_str->fetch()){
		 echo ($row[0])."\n";
		 echo ($row[2])."\n";
		 echo "<font color='blue'>".($row[3])."</font>" ;
		}
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
