<?php
   include('session.php');
?>
<html>
    <head>
        <meta charset='utf-8'>
        <title>superestate.com</title>
		<link rel="stylesheet" type="text/css" href="styles/styles.css"></link>
    </head>
    <script src="scripts/navLoaded.js"></script>
    <script src="scripts/utils.js"></script>
    <body onload="navLoaded();footerLoaded();">
      <div class="content">
        <script type="text/javascript">
          var x = "<?php echo $login_session ?>"; 

          document.writeln('<form id="hiddenform" action="getMyProperty.php" target="my_iframe" method="post">');
          document.writeln("<input type='text' name='username' value='" + x + "'>");
          document.writeln('<input type="submit" value="post">');
          document.writeln('</form>');
          document.getElementById("hiddenform").style.display = "none";
          document.writeln('<iframe name="my_iframe" id="myPropertyFrame"></iframe>');
          document.forms["hiddenform"].submit();
        </script>
      </div>
    </body>
</html>