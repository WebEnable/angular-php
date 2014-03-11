<?php 
require_once 'dbconfig.php';
$salt1 = "web";
$salt2 = "enable";
$forename = 'Admin';
$password = 'Admin123';
$token = md5("$salt1$password$salt2");
add_user($forename, $token);
function add_user($fn, $pw)
{
$query = "INSERT INTO `nileshtutorial`.`login` VALUES('0','$fn','$pw')";
$result = mysql_query($query);
if (!$result) die ("Database access failed: " . mysql_error());
}
?>
</div>
    </body>
</html>
