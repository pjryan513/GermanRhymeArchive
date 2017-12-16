<!DOCTYPE html>
<html>
<body>
<h2>List of all passengers</h2>

<a href="/~ubuntu/createPassenger.php" > Create New Passenger </a>
<p>
    <?php

        //path to the SQLite database file
        $db_file = 'airport.db';

        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);

            //set errormode to use exceptions
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            //return a passenger given an ssn
            $query_str = "select * from passengers;";
            $result_set = $db->query($query_str);

		
            foreach($result_set as $tuple) {
            echo "<font color='blue'>$tuple[ssn]</font> $tuple[f_name] $tuple[m_name] $tuple[l_name]\n";
	 ?>
	    
             <form action="createPassenger.php" method="POST">
		<input type="hidden" name="f" value='<?php echo "$tuple[f_name]";?>'>
		<input type="hidden" name="m" value='<?php echo "$tuple[m_name]";?>'>
		<input type="hidden" name="l" value='<?php echo "$tuple[l_name]";?>'>
		<input type="hidden" name="s" value='<?php echo "$tuple[ssn]";?>'>
		<input type="submit"  name="update" value="update">
		</form>
             <?php
	
	    echo "</br>";
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

