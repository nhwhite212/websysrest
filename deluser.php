<?php
  /* deluser.php  */
  /* a web service to delete a user from a data base */
  /* Norman White  */

/* require the user as the parameter */
if(isset($_GET['uid']) && intval($_GET['uid'])) {

  /* soak in the passed variable or set our own */

  $user_id = intval($_GET['uid']); //no default




  /* connect to the db */
  $link = mysql_connect('websys3.stern.nyu.edu','nwhite','nwhite!!!') or die('Cannot connect to the DB');
  mysql_select_db('nwhite',$link) or die('Cannot select the DB');



 $query = "DELETE   FROM users WHERE  uid="."$user_id";  



  $result = mysql_query($query,$link) or die('Errant query:  '.$query);

      


 { 
   header('Content-type: application/json'); 
   
    echo json_encode($result);
 }

  /* disconnect from the db */
  @mysql_close($link);
 }
ELSE
{
  echo "no uid specified";
}
?>
