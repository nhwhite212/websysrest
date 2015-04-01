<?php
  /* putuser.php  */
  /* a web service to add/replace a user in a database  */
  /* Norman White  */

/* require the user as the parameter */
if(isset($_GET['uid']) && intval($_GET['uid'])) {

  /* soak in the passed variable or set our own */

  $uid = intval($_GET['uid']); //no default
  $username = $_GET['username'];
  $email= $_GET['email'];
  $firstname= $_GET['firstname'];
  $lastname= $_GET['lastname'];
  $password = $_GET['password'];
 


  /* connect to the db */
  $link = mysql_connect('websys3.stern.nyu.edu','nwhite','nwhite!!!') or die('Cannot connect to the DB');
  mysql_select_db('nwhite',$link) or die('Cannot select the DB');
 
  $query = "DELETE FROM users where uid="."$uid";
   $result = mysql_query($query,$link) or die('Errant query:  '.$query);

   /* Now put in the new/replacement row  */

  $query = "INSERT INTO users(uid, username,email,firstname,lastname, password) VALUES ";
  $query = $query."($uid,";
  $query = $query."'"."$username"."',";
  $query = $query."'"."$email"."',";
  $query = $query."'"."$firstname"."',";
  $query = $query."'"."$lastname"."',";
  $query = $query."'"."$password"."'";
  $query = $query.");";


  $result = mysql_query($query,$link) or die('Errant query:  '.$query);




 {
    header('Content-type: application/json'); 
    echo json_encode($result);
 }
 }
 ELSE
{ echo "missing data in insert";}

  /* disconnect from the db */
  @mysql_close($link);

?>
