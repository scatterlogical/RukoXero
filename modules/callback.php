<?php

// ini_set('display_errors', 'On');

if (!isset($_GET['code'])) {
  exit('Error, failed to authenticate.');
}

$state = $_GET['state'];
$code = $_GET['code'];

echo 'Authenticated, this window will close shortly.';

//Send code & state back to original window for remainder of auth process
//so we can access database thru ruko and receive tokens.
echo '<script type="text/javascript"> 
      window.opener.location.replace(window.opener.location+"&state=' . $state . '&code=' . $code . '");
      setTimeout(window.close(), 5000);
      </script>';

?>