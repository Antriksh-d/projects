<?php

include 'include.php';
$check=$_POST['submit'];

$fname = $_POST['firstname'];
$lname = $_POST['lastname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$number= $_POST['number'];

$password = md5($_POST['password']);



if($check==1)
{
$sql2 = "SELECT * FROM details WHERE email='$email'";
$res_e=0;
$res_e = mysqli_query($link, $sql2);


if(($res_e->num_rows) > 0){

    $php_errormsg= 'Email already used, Plz try again';
    header("Location: registration2.php?error_message=$php_errormsg");

}
else{
    $sql = "INSERT INTO details (fname, lname,email,password,ph_no,gender) 
VALUES (?,?,?,?,?,?)";
    if($stmt = mysqli_prepare($link, $sql))
    {
        mysqli_stmt_bind_param($stmt, "ssssss" , $fname,  $lname , $email , $password,$number,$gender);

        $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];

        $number = $_POST['number'];
    $password = md5($_POST['password']);
 if(mysqli_stmt_execute($stmt)){
     //echo 1;die;
     echo "Records inserted successfully.";
     header("Location: display.php");
 }

}}}
else
{
    header("Location:registration.php" );
}
    mysqli_close($link);
?>

