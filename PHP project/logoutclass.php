<?php
session_start();

include_once 'class.user.php';
$user = new User(); $id = $_SESSION['id'];


if (!$user->get_session()){

 header("location:loginclass.php");

}



else{

 $user->user_logout();

 header("location:loginclass.php");

 }
