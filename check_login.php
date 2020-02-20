<?php
    //Start session management
    session_start();
    
    if( array_key_exists("loggedInUserEmail", $_SESSION) ){
        echo "Logged in";
        
    }
    else{
        header ("Location: login.html");
    }
?>

<html>
<a href  = "logout.php">Log out</a>
</html>