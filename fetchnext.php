<?php
  // $currentID = $_POST['current_id'];
  $currentID = 16;
  // $nextID = $currentID + 1;
  // print "r|" . $nextID;
  // exit();

  if( is_file('conn/pdo_config.inc.php') ) {
		include_once('conn/pdo_config.inc.php');
	} else {
		// print "Data object persistence configuration not found: error code 46764567";
		exit(1);
	}

  try {
     // retreive user info for this username
     $dbh = $db_pdo->connect();
     $stmt = $dbh->prepare("SELECT tlu_payload FROM tbl_loop_urls");
     // $stmt->bindParam(':uname', $email);

     if( $stmt->execute() ) {
       $rowset = $stmt->fetchAll();
       $rowset_count = count($rowset)-1;
       // print_r($rowset);
       // die();
       $rowindex = 0;
       // print $rowset_count . "<br />";

       //print $rowset_count;
       // exit();

        $retnext = false;
       foreach ($rowset as $row) {
         // print $rowindex . " | " . $row['tlu_payload'] . "<br />";
         $thisid = $row['tlu_payload'];
         print "Rowindex: " . $rowindex . " | Rowset count: " . $rowset_count . " | ThisID: " . $thisid . " | Current ID: " . $currentID . "<br />";
         // die($thisid);

         if ( $retnext ) {
           $retnext = true;
           print "r|" . $thisid;
           exit();
         }

         if ($thisid == $currentID) {
           if($rowindex == ($rowset_count-1)){
             // at last result
             die("BLAH!");
             print "r|" . $rowset[0]['tlu_payload'];
             exit();
           } else {
             // print "r|" . $thisid;
             // exit();
             $retnext = true;
           }
         }

        $rowindex++;
       }
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
