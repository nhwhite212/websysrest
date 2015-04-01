<?php
/* require the user as the parameter */
  /*  postuser.php  */
  /* this will only update the fields that have values for the user uid */
  /* use putuser.php to add/replace a user  */


  /* must pass a uid  */
if(isset($_GET['uid']) && intval($_GET['uid'])) {



  $uid = intval($_GET['uid']); //no default
  $username = $_GET['username'];
  $email= $_GET['email'];
  $firstname= $_GET['firstname'];
  $lastname= $_GET['lastname'];
  $password = $_GET['password'];
 


  /* connect to the db */
  $link = mysql_connect('websys3.stern.nyu.edu','nwhite','nwhite!!!') or die('Cannot connect to the DB');
  mysql_select_db('nwhite',$link) or die('Cannot select the DB');

 

  $query = "UPDATE  users SET" ;

  $query = $query." uid="."$uid";
  if (isset($_GET['username']) )
        $query = $query.", username ="."'"."$username"."'";
      if (isset($_GET['email']) )
  $query = $query.", email ="."'"."$email"."'";
      if (isset($_GET['firstname']) )
         $query = $query.", firstname="."'"."$firstname"."'";
      if (isset($_GET['lastname']) )
         $query = $query.", lastname="."'"."$lastname"."'";
      if (isset($_GET['password']) )
       $query = $query.", password="."'"."$password"."'";
  $query = $query." WHERE uid=$uid";


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
