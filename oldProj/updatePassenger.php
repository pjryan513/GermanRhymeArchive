<?php
        if (isset($_POST['u'])){
        echo "works";
        $db_file = 'airport.db';
        try {
            //open connection to the airport database file
            $db = new PDO('sqlite:' . $db_file);
	    
            //set errormode to use exceptions
           
	    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $db->prepare("UPDATE passengers SET f_name = :first, m_name= :middle, l_name= :last, ssn= :ssn WHERE ssn = :ssnt");
            $stmt->bindParam(':first', $_POST['first']);
            $stmt->bindParam(':middle', $_POST['middle']);
            $stmt->bindParam(':last', $_POST['last']);
            $stmt->bindParam(':ssn', $_POST['ssn']);
	    $stmt->bindParam(':ssnt', $_POST['origssn']);
            //$db->execute($stmt);
            $stmt->execute();

            //disconnect from db
            $db = null;
        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }

        //return success message
        echo 'Your information has successfully been updated:';
        echo ' First: '. $_POST['first'];
        echo ', Last: '. $_POST['last'];
        echo ', Middle: '. $_POST['middle'];
        echo ', SSN: '. $_POST['ssn'];
	header("Location: /~ubuntu/showPassengers.php");
        }


?>
