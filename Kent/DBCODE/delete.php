<?php
        if (isset($tuple['rID'])){
        $db_file = "hoopD6.db";
        try {
            //open connection to the hooper database file
            $db = new PDO("sqlite:" . $db_file);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //Insert into illustrator
            $stmt = $db->prepare("DELETE FROM contains WHERE rID = :rID AND volumeID = :vID;");
            $stmt->bindParam(":rID", $tuple["rID"]);
            $stmt->bindParam(":vID", $tuple["volumeID"]);
            $stmt->execute();
            
            $stmt2 = $db->prepare("DELETE FROM drawn WHERE rID = :rID AND volumeID = :vID;");
            $stmt2->bindParam(":rID", $tuple["rID"]);
            $stmt2->bindParam(":vID", $tuple["volumeID"]);
            $stmt2->execute();
            $db = null;

        }
        catch(PDOException $e) {
            die('Exception : '.$e->getMessage());
        }

        //return success message
        echo 'This rhyme: '. $tuple['flor'];
        echo ' was deleted from '. $tuple['title']
        }
?>