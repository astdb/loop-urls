<html>
<head><title>This is Page <?php print htmlspecialchars($pageid);?></title></head>
<body>
  <p><br /><br /><br /><br /><br /><h1>[Page: <?php if(isset($pageid)) print $pageid; else print "_undefined"; ?>]</h1></p>
  <script type="text/javascript" src="jquery-1.12.4.js"></script>
  <script>
    var currentPID = <?php if(isset($pageid)) print '\''.$pageid.'\''; else print "null"; ?>;

    <?php
      if($loop) {
        print 'window.onload = function() {
          // getNextURI();
          timeoutID = window.setTimeout(getNextURI, 2000);
        };';
      }
    ?>

    function getNextURI() {
      $.post('fetchnext.php', {
        'current_id': currentPID
      }, function (sdata, sstatus){
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
          var currentURI_str = "" + currentURI;
          var nextURI = currentURI_str.replace(currentPID, sdata_data);
          window.location.replace(nextURI);
        }
      });
    }
  </script>
</body>
</html>
