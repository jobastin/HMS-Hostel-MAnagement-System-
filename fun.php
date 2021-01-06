<?php

function connect($caller="fun"){
    //helps to connect to whicheveer database is being used
    $server = "localhost";
    $db = "hms";
    $user = "root";
    $pw = "";
    $con = mysqli_connect($server, $user, $pw, $db) or die("$caller : Unable to connect to db.");
    return $con;
}


function sessioncheck(){
    //checks if a user has logged in, returns to signinpage otherwise
    session_start();
    if (!isset($_SESSION['loginid'])){
        return false;
    } else {
        return true;
    }
}


function sessiondelete(){
    session_start();
    if (isset($_SESSION['loginid'])){
        unset($_SESSION['loginid']);
    }
    session_destroy();
}

function fusername()
{
?>
<script>alert("fdgsdfg");</script>
<?php
}
?>