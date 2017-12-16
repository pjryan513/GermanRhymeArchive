<!DOCTYPE html>
<html>
<body>
<p>
    <?php

        //path to the SQLite database file
        $db_file = '/etc/myDB/airport.db';
	echo $_POST["Query"]."<br>";
        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //return what the query asked for
            $result_set = $db->query($_POST["Query"]);
            foreach($result_set as $tuple){
		for($x = 0;$x < (count($tuple)/2);$x++){
		print_r($tuple[$x]."\n");
		}
            echo "<br>";
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
