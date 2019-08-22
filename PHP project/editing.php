<?php

include 'include.php';
if (isset($_POST['edit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];
    $number = $_POST['ph_no'];


    $sql2 = "SELECT id, fname, lname, email, password, gender, ph_no FROM details WHERE email=? AND id != ?";

    if($stmt = mysqli_prepare($link, $sql2)) {


        mysqli_stmt_bind_param($stmt, "ss", $email,$id);




        mysqli_stmt_execute($stmt);

        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt,$id, $fname, $lname, $email, $password, $gender, $number);

    }

    if($stmt->affected_rows > 0)
    //if(($res_e-> num_rows) > 0)
    {

         $php_errormsg= 'Email already used, Plz try again';
    header("Location: edit.php?id=$id error_message=$php_errormsg");

}

else {

    $sql3 = "UPDATE details SET fname='$fname',lname='$lname',email='$email',ph_no='$number', gender='$gender' WHERE id = '$id'";
     mysqli_query($link, $sql3);

    echo 'Record edited succesfully';
}
    } else {

    header("Location:edit.php");
}


mysqli_close($link);
?>
