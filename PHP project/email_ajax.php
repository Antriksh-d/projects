<?php

include 'include.php';


if(isset($_POST['email']))
{

    $email=$_POST['email'];
    $sql2 = "SELECT * FROM details WHERE email='$email'";

    $res_e=0;
    $res_e = mysqli_query($link, $sql2);
    if(($res_e->num_rows) > 0) {
        // ...
        // ...
        // based on successful authentication
        echo json_encode(array('success' => 1));


    }  }
?>