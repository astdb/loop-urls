<html>
<head><title>This is Page <?php print htmlspecialchars($pageid);?></title></head>
<body>
  <p><br /><br /><br /><br /><br /><h1>[Page: <?php if(isset($pageid)) print $pageid; else print "_undefined"; ?>]</h1></p>
  <script type="text/javascript" src="jquery-1.12.4.js"></script>
  <script>
    var currentPID = <?php if(isset($pageid)) print '\''.$pageid.'\''; else print "null"; ?>;
    window.onload = function() {
      // getNextURI();
      timeoutID = window.setTimeout(getNextURI, 4000);
    };

    function getNextURI() {
      var currentURI = window.location;
      var nextPID = currentPID++;
      currentURI.replace(currentPID, nextPID);
      alert(currentURI);
      $.post('fetchnext.php', {
        'current_id': currentPID
      }, function (sdata, sstatus){
        //alert("Return value from signin service: " + sdata);
        //Capture and separate (searchtype | result)-format server response
        var sdata_array = sdata.split("|");
        var sdata_type = sdata_array[0];
        var sdata_data = sdata_array[1];

        if( sdata_type === "m" ) {
          // error
          $('#signinerror').html("<div class='alert alert-danger'>" + sdata_data + "</div>");
          //Recaptcha.reload();
        } else if( sdata_type === "r" ){
          // success - next-to-go URL sent from backend
          var currentURI = window.location;
          var nextURI = currentURI.replace(currentPID, sdata_data);
          window.location.replace(currentURI);
        }
      });
    }
  </script>
</body>
</html>
