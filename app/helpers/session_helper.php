<?php
// starting the session for the user
session_start();
/* if the user wants to create a post he must be logged in
    and the log in / log out button will depend on this function as well
 */

function isLoggedIn()
{
    if(isset($_SESSION['user_id']))
        return true;
    else
        return false;
}

