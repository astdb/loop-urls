<?php
  $currentID = $_POST['current_id'];

  if( is_file('conn/pdo_config.inc.php') ) {
		include_once('conn/pdo_config.inc.php');
	} else {
		exit(1);
	}

  try {
     // retreive user info for this username
     $dbh = $db_pdo->connect();
     $stmt = $dbh->prepare("SELECT tlu_payload FROM tbl_loop_urls WHERE tlu_active=1");

     if( $stmt->execute() ) {
       $rowset = $stmt->fetchAll();
       $rowset_count = count($rowset);
       $rowindex = 0;
       $retnext = false;

       foreach ($rowset as $row) {
         $thisid = $row['tlu_payload'];

         if ( $retnext ) {
           $retnext = false;
           print "r|" . $thisid;
           exit();
         }

         if ($thisid == $currentID) {
           if($rowindex == ($rowset_count-1)){
             print "r|" . $rowset[0]['tlu_payload'];
             exit();
           } else {
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
