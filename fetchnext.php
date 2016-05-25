<?php
  $currentID = $_POST['current_id'];
  // $currentID = 10;
  // $nextID = $currentID + 1;
  // print "r|" . $nextID;
  if( is_file('conn/pdo_config.inc.php') ) {
		include_once('conn/pdo_config.inc.php');
	} else {
		print "Data object persistence configuration not found: error code 46764567";
		exit(1);
	}

  try {
     // retreive user info for this username
     $dbh = $db_pdo->connect();
     $stmt = $dbh->prepare("SELECT tlu_payload FROM tbl_loop_urls");
     // $stmt->bindParam(':uname', $email);

     if( $stmt->execute() ) {
       $rowset = $stmt->fetchAll();
       $rowset_count = count($rowset);
       // print_r($rowset);
       // die();
       $rowindex = 0;
       // print $rowset_count . "<br />";
       foreach($rowset as $row){
         // print $rowindex . " | " . $row['tlu_payload'] . "<br />";
         $thisid = $row['tlu_payload'];
         // die($thisid);

         if ($thisid == $currentID) {
           if($rowindex == ($rowset_count-1)){
             // at last result
             print "r|" . $rowset[0]['tlu_payload'];
             exit();
           } else {
             print "r|" . $thisid;
             exit();
           }
         }

        $rowindex++;
       }

      //  while( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
      //     $thisid = intval(trim($row['tlu_payload']));
       //
      //      if($currentID == $thisid){
       //
      //      }
      //  }
     } else {
       print "m|Error executing prepared statement: #56765572</b>";
       exit();
     }if( is_file('conn/pdo_config.inc.php') ) {
		include_once('conn/pdo_config.inc.php');
	} else {
		print "Data object persistence configuration not found: error code 46764567";
		exit(1);
	}
     $dbh = null;
   } catch (PDOException $e) {
       print "m|Error!: " . $e->getMessage() . "<br/>";
       die();
   }
